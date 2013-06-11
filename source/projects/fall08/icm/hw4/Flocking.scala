/**
 * Flocking
 * by Daniel Shiffman.  
 * 
 * An implementation of Craig Reynold's Boids program to simulate
 * the flocking behavior of birds. Each boid steers itself based on 
 * rules of avoidance, alignment, coherence, and fear of other species.
 * 
 * Click the mouse to start, and again to add a new boid.
 *
 * Scala translation by Nathan Hamblen.
 * Additional species and collision behavior by Steven Lehrburger - 9/24/2008 - NYU/ITP/ICM/Shiffman
 */

package flocking
import processing.core._
import Implicits._

class Flocking extends PApplet {
    val flock: Flock = new Flock(this)			// make the Flock
    var started = false							// makes it necessary to click to start the boids moving
    var oldSize = flock.size					// so we only print the size when it changes - easier on the eye in the console

    override def setup() {						
	  size(400, 300)
      colorMode(PConstants.RGB,255,255,255,100)
      smooth()
      
      simulateClicks							// simulate a bunch of random clicks at the beginning
                                                // if they were all at the same place, the boids would immediately collide and go poof
	  drawWork									// runs draw once, so everything is visible before the first click
	}
 
	override def draw() {
	  if (started) {							// after the first click, it draws continuously
        drawWork
      }
	}
	
    override def mousePressed() {				// clicking makes a new Boid
	  if (started) 								// but only if we've started
        oneClick(mouseX, mouseY)	
   
      started = true							// and note that we have started, which is always the case after the first click
	}
 
    def oneClick(x: Float, y: Float) {			// one click makes a new Boid at the given point with the current type/color/species
      flock <<< new Boid(Vector(x,y), 2.0, 0.05, flock.getSpecies, this)
    }
    
    def simulateClicks {						// simulates some number of clicks, giving the boids random positions on the screen
      var i = 0
      while (i < 25) {
        oneClick(random(0, width), random(0, height))
        i += 1
      }
    }
    
    def drawWork {								// does the actual work of draw
	  background(255)							// sets the background and runs the flock
      flock.run()
      
      if (flock.size != oldSize) {				// only print the current number of Boids if it has changed
        println(flock.size)
        oldSize = flock.size
      }
    }
}

// Jorge Ortiz gave me this code to resolve type issues with doubles and floats in various places
// I think spde (Scala Processing Development Environment) does this automatically
// This is a dangerous solution, but its ok for now, and much easier than doing all the conversions manually
object Implicits {
  implicit def double2float(d: Double): Float = d.toFloat  
}

object FlockingApp { 
  def main(args: Array[String]) {
    processing.core.PApplet.main(Array("flocking.Flocking"))
  }
}
