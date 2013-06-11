/**
 * Jumping Tweets v2
 * by Steven Lehrburger - 10/22/2008 - NYU/ITP/ICM/Shiffman
 * (new name coming soon!)
 * 
 * (partial) copyright (C) 2001, 2008 United States Government as represented by the Administrator of the National Aeronautics and Space Administration. All Rights Reserved.
 * 
 * Build on NASAs' World Wind open source globe/mapping project and Twitter's Search Atom feed API. 
 * 
 * Currently, pulls 15 most recent and then constantly all subsequent tweets that contain "Retweeting".
 * It then displays them in an applet on at random latitude and longitudes on the globe using Annotations,
 * with Polylines between that location and NYC. This is very, very far from finished, and more information
 * can be found on my blog here - http://lehrblogger.com/?p=135 and http://lehrblogger.com/?p=186 and
 * and http://lehrblogger.com/?p=188
 * 
 * Credit to Jorge Ortiz for assistance getting a lof of basic Scala and World Wind things working.
 */
package localhost

import gov.nasa.worldwind.util.StatusBar
import gov.nasa.worldwind.avlist._
import gov.nasa.worldwind._
import gov.nasa.worldwind.geom._
import gov.nasa.worldwind.render._
import gov.nasa.worldwind.globes._
import gov.nasa.worldwind.layers._	
import gov.nasa.worldwind.awt._
import gov.nasa.worldwind.examples.LineBuilder

import javax.swing._
import java.awt._
import java.util.ArrayList
import javax.media.opengl.GLContext
import java.util.Random

import scala.actors._ 
import scala.actors.Actor._

class WWJApplet extends JApplet
{
    val globeActor = actor { 																// declare this here so that it can be passed to the new TweetHandler
        loop {
          react {
              case newTweet: Tweet => displayNewTweet(newTweet)								// whenever it receives a new Tweet as a message, display it
            //case newRetweetTree: RetweetTree => println("displayChain(newRetweetTree)")
          }
          // keep doing globe stuf
       }
    }
      
    var wwd: WorldWindowGLCanvas = new WorldWindowGLCanvas()								// stuff to get the WW working - heavily based on the basic WWJApplet example
    var statusBar: StatusBar = new StatusBar()
    var context = new DrawContextImpl														// random stuff I do not full understand for the DrawingContext, for the lines and Annotations
    var tweetHandler = new TweetHandler(globeActor)
    var checkDelayInSeconds = 4							// how long between checks to the Twitter Atom feed?  make sure it is at least 30s in final version, but less is okay for testing
    
    override def init()
    {
      this.getContentPane().add(this.wwd, BorderLayout.CENTER)							    // Create World Window GL Canvas
                                                                                            // Create the default model as described in the current worldwind properties.
	  var m: Model = WorldWind.createConfigurationComponent(AVKey.MODEL_CLASS_NAME).asInstanceOf[Model]
      var context = wwd.getSceneController.getDrawContext
	  this.wwd.setModel(m)
      context.setModel(m)
      context.setSurfaceGeometry(new SectorGeometryList) 									// spent a long time pouring through docs to find stuff for the DrawingContext that worked
      context.setGLContext(wwd.getContext)
   
	  this.getContentPane().add(statusBar, BorderLayout.PAGE_END)					        // Add the status bar
	
	  this.statusBar.setEventSource(this.wwd)										        // Forward events to the status bar to provide the cursor position info.

      val twitterActor = actor { 															// now we can set up the other main thread that checks for tweets
        def checkLater() { 																	
          val mainActor = self 
          actor { 																			// so that the whole thread doesn't block when it's waiting, this other thread can block
            Thread.sleep(checkDelayInSeconds * 1000) 
            mainActor ! "check_again"  
          } 
        }
        checkLater() 
        
        loop { 																				// loops continuously
          react { 
            case "check_again" => {															// if it was told to check again by the sub-thread
              tweetHandler.handleRecentRetweets												// do the check
              checkLater()																	// and then wait to check the next time
            }
          } 
        } 
      } 	
      
      return																				// (since you can't reutnr a declaration)
    }
    
    def insertAtEnd(wwd: WorldWindow, layer: Layer)											// inserts the layer at the end fo the WorldWindow's layer list
    {
        // Insert the layer into the layer list just before the compass.
        var compassPosition: Int = 0
        var layers: LayerList = wwd.getModel().getLayers()	
       // for (var i = 0; i < layers.length; i++) {											// I was having issues with LayerList being a Java List, and Scala wanting to use Scala listss
       //    if (layers.getValue(i) instanceof CompassLayer)
       //         compassPosition = i;
       // }
        layers.add(layers.size, layer)
    }
 
    override def stop() {
        WorldWind.shutDown();																 // Shutdown World Wind
    }
    
    def displayNewTweet(t: Tweet) = {														 // displays one new tweet
      var randCoord: Random = new Random()													 // it will have a random location, I haven't done the location data yet
      
      val curLoc: Position = Position.fromDegrees(40.73, -73.993, 5000)						 // all tweets start from NYC, for now
      val tLoc: Position = Position.fromDegrees(randCoord.nextFloat * 180 - 90, randCoord.nextFloat * 360 - 180, 5000)
      																						 // and is going to a random location, for demonstration purposes
      
      var posArray = new ArrayList[Position]
      posArray.add(curLoc)
      posArray.add(tLoc)

      var testPolyline = new Polyline(posArray)												 // make the new line - WHY IS IT DASHED
      testPolyline.setLineWidth(3)															 // assorted attempts to make it not dashed..
      //testPolyline.setNumSubsegments(1)
      testPolyline.setPathType(Polyline.LINEAR)
      testPolyline.setAntiAliasHint(Polyline.ANTIALIAS_NICEST)
      var rl: RenderableLayer = new RenderableLayer();
      new LineBuilder(wwd, rl, testPolyline)												 // draws the line
     
      rl.addRenderable(new GlobeAnnotation(t.author + ": " + t.text, tLoc));				 // adds the annotation with the Tweet author and text
      insertAtEnd(wwd, rl);																	 // puts entire thing on the screen as a new layer
      
    }
}