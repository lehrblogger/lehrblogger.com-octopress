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
import java.util.{ArrayList => JArrayList}

import scala.actors._ 
import scala.actors.Actor._
import scala.collection.jcl.Conversions._
import scala.collection.jcl._

class WWJApplet extends JApplet
{
    val globeActor = actor { 																// declare this here so that it can be passed to the new TweetHandler
        loop {
          react {
              case newRetweetPair: RetweetPair => displayNewTweet(newRetweetPair)								// whenever it receives a new Tweet as a message, display it
	          println("New Retweet Pair----------------------------------------")
              println(newRetweetPair.rt)
              println(newRetweetPair.ot)
          }
          // keep doing globe stuf
       }
    }
      
    var wwd: WorldWindowGLCanvas = new WorldWindowGLCanvas()								// stuff to get the WW working - heavily based on the basic WWJApplet example
    var statusBar: StatusBar = new StatusBar()
    var context = new DrawContextImpl														// random stuff I do not full understand for the DrawingContext, for the lines and Annotations
    var tweetHandler = new TweetHandler(globeActor)
    var checkDelayInSeconds = 3 						// how long between checks to the Twitter Atom feed?  make sure it is at least 30s in final version, but less is okay for testing
    
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
      
      //var tweetLayer: Layer = new RenderableLayer;
      var layers: scala.List[Layer] = wwd.getModel.getLayers.toList
      layers = layers.filter { l =>
	      (//l.isInstanceOf[gov.nasa.worldwind.layers.StarsLayer] ||
           //l.isInstanceOf[gov.nasa.worldwind.layers.SkyGradientLayer] ||
        //   l.isInstanceOf[gov.nasa.worldwind.layers.FogLayer] ||
        //   l.isInstanceOf[gov.nasa.worldwind.layers.Earth.BMNGOneImage] ||
        //   l.isInstanceOf[gov.nasa.worldwind.layers.Earth.BMNGWMSLayer] ||
           //l.isInstanceOf[gov.nasa.worldwind.layers.Earth.LandsatI3WMSLayer] ||
           //l.isInstanceOf[gov.nasa.worldwind.layers.Earth.NAIPCalifornia] ||
           //l.isInstanceOf[gov.nasa.worldwind.layers.Earth.USGSUrbanAreaOrtho] ||
           //l.isInstanceOf[gov.nasa.worldwind.layers.Earth.EarthNASAPlaceNameLayer] ||
           //l.isInstanceOf[gov.nasa.worldwind.layers.WorldMapLayer] ||
           //l.isInstanceOf[gov.nasa.worldwind.layers.ScalebarLayer] ||
           //l.isInstanceOf[gov.nasa.worldwind.layers.CompassLayer] ||
           false //for commenting 
	      )
	      //if (l.isInstanceOf[gov.nasa.worldwind.layers.Earth.BMNGOneImage] || l.isInstanceOf[gov.nasa.worldwind.layers.Earth.BMNGWMSLayer] || l.isInstanceOf[gov.nasa.worldwind.layers.Earth.LandsatI3WMSLayer] || l.isInstanceOf[WorldMapLayer]  || l.isInstanceOf[ScalebarLayer]|| l.isInstanceOf[CompassLayer]) 
	  }    
      layers.foreach { l =>
       //     l.setEnabled(false)
	      //if (l.isInstanceOf[gov.nasa.worldwind.layers.Earth.BMNGOneImage] || l.isInstanceOf[gov.nasa.worldwind.layers.Earth.BMNGWMSLayer] || l.isInstanceOf[gov.nasa.worldwind.layers.Earth.LandsatI3WMSLayer] || l.isInstanceOf[WorldMapLayer]  || l.isInstanceOf[ScalebarLayer]|| l.isInstanceOf[CompassLayer]) 
	  }    
      wwd.getModel.setLayers(new LayerList(layers.toArray))
 
      /*
      var compassIndex: Int = layers.size
      layers.zipWithIndex.foreach { pair =>     // iterate over the array of tweets
	     val (l, index) = pair               // grab each pair
	     
	     if (l.isInstanceOf[CompassLayer]) {
	       compassIndex = index             // and grab the index if they match
	     }
	  }      
      layers = layers.take(compassIndex - 1) ++ Array[Layer](tweetLayer) ++ layers.drop(compassIndex)
     */
//      context.setVisibleSector(Sector.EMPTY_SECTOR)
      return																				// (since you can't reutnr a declaration)
    }

     
    override def stop() {
        WorldWind.shutDown();																 // Shutdown World Wind
    }
    
    def displayNewTweet(rtpair: RetweetPair) = {														 // displays one new tweet
      
      val otLoc: Position = Position.fromDegrees(rtpair.ot.lat, rtpair.ot.lon, 0)						 // all tweets start from NYC, for now
      val rtLoc: Position = Position.fromDegrees(rtpair.rt.lat, rtpair.rt.lon, 0)																						 // and is going to a random location, for demonstration purposes
      var posArray = new ArrayList[Position]
      posArray.add(otLoc)
      posArray.add(rtLoc)

      var randColor = new Random()	
      val c = new Color((randColor.nextFloat * 100).toInt + 155, (randColor.nextFloat * 100).toInt + 155, (randColor.nextFloat * 100).toInt + 155)
      
      var line = new Polyline(posArray)												 // make the new line - WHY IS IT DASHED
      line.setLineWidth(3)															 // assorted attempts to make it not dashed..
      line.setAntiAliasHint(Polyline.ANTIALIAS_NICEST)
      line.setFollowTerrain(true);
      line.setColor(c)
      
      var annAttr = new AnnotationAttributes()
      annAttr.setOpacity(.5)
      annAttr.setBorderColor(c)
      annAttr.setTextColor(c)
      var rtText = new GlobeAnnotation(rtpair.rt.author + ": " + rtpair.rt.text, rtLoc)
      rtText.setAttributes(annAttr)
      var otText = new GlobeAnnotation(rtpair.ot.author + ": " + rtpair.ot.text, otLoc)
      otText.setAttributes(annAttr)
      
      var tweetLayer: RenderableLayer = new RenderableLayer();
      tweetLayer.addRenderable(line);
      tweetLayer.addRenderable(rtText);
      tweetLayer.addRenderable(otText);
      wwd.getModel.getLayers.add(wwd.getModel.getLayers.size, tweetLayer);

    }
}