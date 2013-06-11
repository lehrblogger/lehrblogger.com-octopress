/**
 * Flocking by Daniel Shiffman.  
 * Scala translation by Nathan Hamblen.
 * Additional species and collision behavior by Steven Lehrburger - 9/24/2008 - NYU/ITP/ICM/Shiffman
 */
 // Boid Class 

package flocking
import processing.core._
import Implicits._

class Boid(	
    var loc: Vector, 	// location
    val maxspeed: Float, 	// Maximum steering force
    val maxforce: Float,  	// Maximum speed
    val species: Int,		// species
    val parent: PApplet		// so Boid can draw itself
  ) {
                        // initial velocity is random
  var vel = Vector(parent.random(-1,1),parent.random(-1,1))	
  val r = 2.0			// and they are all the same size
  
  def getSpecies = {	// getter for the Boids species
    species
  }
  
  def run(boids: List[Boid]) {	// runs a single Boid, but needs to know about all the other Boids
    val acc = flock(boids)		// figure out what the acceleration would be
    update(acc)					// update the location
    render()					// draw the boid
  }

  // We accumulate a new acceleration each time based on three rules
  def flock(boids: List[Boid]) = {
    val sep = separate(boids) * 1.5   	// Separation, aribtrarily weighted
    val ali = align(boids)      		// Alignment
    val coh = cohesion(boids)   		// Cohesion
    val fea = fear(boids) 				// Fear
    sep + ali + coh + fea			    // Add the force vectors to acceleration
  }
  
  def update(acc: Vector) {				// update the location and velocity for the Boid
    vel = (vel + acc) max maxspeed		// Update velocity, with a maximum speed
    loc = borders(loc + vel)			// wrap the Boid around if it has gone off the screen
  }

  
 
  // A method that calculates and returns a steering vector towards a target
  // Takes a second argument, if true, it slows down as it approaches the target
  def steer(target: Vector, slowdown: Boolean) = {
    val desired = (target - loc).normalized // A vector pointing from the location to the target
    val d = desired.magnitude 				// Distance from the target is the magnitude of the vector
   if (d > 0) {   							// If the distance is greater than 0, calc steering (otherwise return zero vector)
     (desired * maxspeed * (
        if (slowdown && d < 100.0)			// Two options for desired vector magnitude (1 -- based on distance, 2 -- maxspeed)
          d/100.0							// This damping is somewhat arbitrary
        else 
          1.0
      ) - vel) max maxforce 				// Steering = Desired minus Velocity maxed to maxforce
    } else {
      new Vector
    }
  }
  
  def render() {				    // Draw a triangle rotated in the direction of velocity
    val fill = 255					// to make it easy to change how light/dark the colors of the Boids are
    val stroke = 155
    val theta = vel.heading + PApplet.radians(90);
    
    if (species == 0) {				// set the colors depending on which of three species the Boid is
      parent.fill(fill,0,0)
      parent.stroke(stroke,0,0)
    } else if (species == 1) {
      parent.fill(0,fill,0)
      parent.stroke(0,stroke,0)
    } else if (species == 2) {
      parent.fill(0,0,fill)
      parent.stroke(0,0,stroke)
    }
    
    parent.pushMatrix()				// I don't know what push and pop matrix are doing, but everything else seems to make sense here
    parent.translate(loc.x,loc.y)
    parent.rotate(theta)
    parent.beginShape(PConstants.TRIANGLES)
    parent.vertex(0, -r*2)
    parent.vertex(-r, r*2)
    parent.vertex(r, r*2)
    parent.endShape()
    parent.popMatrix()
  }
  
  def borders(loc: Vector) = {		// if a boid flies off the screen, wrap it around to the other side
    def wrap(n: Float, a: Float, b: Float) = n match {
      case n if n < a => b			// the x and y directions are wrapped in the same way, so this can be decomposed
      case n if n > b => a
      case n => n
    }
    Vector(							// only wraps when the boid is completely off the screen
      wrap(loc.x, -r, parent.width+r),
      wrap(loc.y, -r, parent.height+r)
     )
  }
  
  def overlap(other: Boid): Boolean = {	
    return (						// does this Boid overlap with the other passed Boid?
      (loc.x < other.loc.x + r) &&
      (loc.x > other.loc.x - r) &&
      (loc.y < other.loc.y + r) && 
      (loc.y > other.loc.y - r)
     )
  }

  
  
/* All of the really cool/intense Scala code is down here */
/* i.e all the "wacky Scala gang signs"					  */
  
  
  // is the other bird within a certain distance
  def within(dist: Float) = { other: Boid =>							// so I think other is the first in a second set of parameters, see within()() calls below
    val d = loc distance other.loc										// get the distance between their two locations
    d > 0 && d < dist													// and return if it is wihin that distance
  }
  
  // is the other bird of the same species
  def sameSpecies = { other: Boid =>									// works just like within
    species == other.getSpecies											// but instead checks for species
  }
  
  // Sum, and divide by size
  def avg(l: List[Vector]) = (l :\ new Vector)(_ + _) / (l.size max 1)	// l is the list, and :\ folds it left, and stores the result in a new Vector
                                                                        // the (_ + _) is a _ + _ parameter going into the foldLeft function
                                                                        // it will recursively sum all of the elements
                                                                        // its the equivalent of doing foldLeft(new Vector)(_ + _)
                                                                        // finally, it divides by the size of the list, or 1, to avoid dividing by zero
  
  // Separation
  // Method checks for nearby boids and steers away
  def separate (boids: List[Boid]) = 									// separate takes the list of all boids
    avg(boids.filter(within(25.0)).map { other =>						// and it filters for all the boids within 25 pixels, and then maps an anonymous function onto the list
      (loc - other.loc).normalized / (loc distance other.loc)			// and this function normalizes the difference between the locations and divides by the distance
    })																	// so then with this array of Vectors for each boid within 25, it takes the average and returns the result
  
  
  // Alignment
  // For every nearby boid in the system, calculate the average velocity
  def align (boids: List[Boid]) = avg(boids.filter(b => within(50.0)(b) && sameSpecies(b)).map(_.vel)) max maxforce
                                                                        // so align uses the current boid and the list of boids
                                                                        // it filters all of the boids that are within 50 pixels of the current boid and are also the same species
                                                                        // and then finds the average of the list of their velocities, and maxes it with the passed maximum force
                                                                        // it finds their average velocities by mapping an anonymous function onto the filtered list
                                                                        // and this function, _.vel, just returns the velocity of that boid, which can then be averaged
  
  // Cohesion
  // For the average location (i.e. center) of all nearby boids, calculate steering vector towards that location
  def cohesion (boids: List[Boid]) = boids.filter(b => within(50.0)(b) && sameSpecies(b)) match {
    case Nil => new Vector												// cohesion is using a similar filter, but instead of averaging their velocities, it is matching certain cases
    case nearby => steer(avg(nearby.map(_.loc)), false)					// if no cases are matched, it returns a (0,0) Vector, otherwise it returns a steering Vector
                                                                        // which is caclculated using the steering function, of which a Vector is a parameter
                                                                        // and this Vector is calculated by mapping a _.loc ananymous function onto all of the nearby Boids of this species
                                                                        // and then taking the average of this List of locations
      
  }
  
  // Fear
  // Just like cohesion, but it steers away from boids of other species
  def fear (boids: List[Boid]) = boids.filter(b => within(50.0)(b) && !sameSpecies(b)) match {
    case Nil => new Vector
    case nearby => (new Vector - steer(avg(nearby.map(_.loc)), false))
  }
  
}

