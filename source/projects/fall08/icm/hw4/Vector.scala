/**
 * Flocking by Daniel Shiffman.  
 * Scala translation by Nathan Hamblen.
 * Additional species and collision behavior by Steven Lehrburger - 9/24/2008 - NYU/ITP/ICM/Shiffman
 */
 // simple Vector Class 
package flocking
import Implicits._

case class Vector(var x: Float, var y: Float) {
  
  def this() = this(0.0, 0.0)				// secondary constructor for 0 vector

  def magnitude = Math.sqrt(x*x + y*y)	 	// magnitude is length of vector

  def + (v: Vector) = Vector(x+v.x, y+v.y)	// define basic mathematical operations

  def - (v: Vector) = Vector(x-v.x, y-v.y)

  def * (n: Float) = Vector(x*n, y*n)

  def / (n: Float) = Vector(x/n, y/n)

  def normalized = {						// return a unit vector in this direction
    magnitude match {
      case m if m > 0 => this / m
      case m => this
    }
  }

  def max(m: Float) = {						// which has a larger magnitude
    if (magnitude > m)
      normalized * m
    else this
  }

  def heading = -1 * Math.atan2(-y, x)		// angle representing the direction (i think)

  def distance (v: Vector) = {				// distance between two vectors
    val dx = x - v.x;
    val dy = y - v.y;
    Math.sqrt(dx*dx + dy*dy)
  }
}