/**
 * Flocking by Daniel Shiffman.  
 * Scala translation by Nathan Hamblen.
 * Additional species and collision behavior by Steven Lehrburger - 9/24/2008 - NYU/ITP/ICM/Shiffman
 */
 // Poof Class - handles the graphics for a single collision poof/explosion

package flocking
import processing.core._
import Implicits._

class Poof(
    var loc: Vector,								// needs a location
    val parent: PApplet									// and the PApplet to be able to draw themselves
  ) {
  var radius = 20									// the initial size of the poof
  
  def run {	
    val color = 0									// how dark should the poof be
    parent.stroke(color, color, color, 30)
    parent.fill(color, color, color, 50)
    parent.ellipse(loc.x, loc.y, radius, radius)	// draw a circle of that size at that location
    radius -= 1										// and shrink it for the next frame
  }
}