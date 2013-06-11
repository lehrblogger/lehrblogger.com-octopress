/**
 * Flocking by Daniel Shiffman.  
 * Scala translation by Nathan Hamblen.
 * Additional species and collision behavior by Steven Lehrburger - 9/24/2008 - NYU/ITP/ICM/Shiffman
 */
 // Flock Class - keeps track of all the Boid objects

package flocking
import processing.core._
import Implicits._

class Flock(val parent: PApplet) {								// the Boids will need the PApplet so they can draw themselves
  var curSpecies = 0										// keep track of the current type/color/species of boid
  private var boids: List[Boid] = Nil						// the list of boids starts empty
  val poofs: Poofs = new Poofs(parent)						// and we'll need this for when collisions happen

  def run() {												// run has two functiosn defined in it... start reading the comments at the bottom
    def runAndCollide(b: Boid) {							// run and check for collissions... again start reading at end
      def filterOverlaps(b1: Boid, b2: Boid) {				// looks to see if the first boid and the second boid have collided
        if ((b1 != b2) && (b1.overlap(b2))) {				// if they are not the same, and they have
          boids = boids.filter(each => (each != b1) && (each != b2))	// filter both of them out of the List
          poofs <<< ((b1.loc + b2.loc) / 2)					// and make a new Poof at the midpoint of their two centers
        }
      }
      
      b.run(boids)											// run the boid
      boids.foreach(other => filterOverlaps(b,other))		// and then see if it overlaps with any other boids
    }
      
    boids.foreach(b => runAndCollide(b))					// for each boid in the flock, we want to run and check for collissions
    
    poofs.run												// and then run
  }
  
  def <<< (b: Boid) { boids = List(b) ++ boids }			// and a new Boid to the Flock
  
  def getSpecies: Int = {									// get the current Boid type/color/species, and go to the next oe
    if (curSpecies < 2) 
	  curSpecies += 1
	else 			      
	  curSpecies = 0
    
    curSpecies												// be sure to return the current species
  }
    
  def size: Int = {												// its nice to know how many Boids there are in the console
    boids.length
  }
}
