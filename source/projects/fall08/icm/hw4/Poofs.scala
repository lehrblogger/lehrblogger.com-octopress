/**
 * Flocking by Daniel Shiffman.  
 * Scala translation by Nathan Hamblen.
 * Additional species and collision behavior by Steven Lehrburger - 9/24/2008 - NYU/ITP/ICM/Shiffman
 */
 // Poofs Class - keeps track of the list of poofs, and removes the ones that are done 

package flocking
import processing.core._
import Implicits._

class Poofs(val parent: PApplet) {								// the poofs will need the PApplet so they can draw themselves
  private var poofList: List[Poof] = Nil					// the actual list of poofs starts empty
  
  def run() {
    def runAndRemove(p: Poof) {							    // (I love declaring functions like this
      p.run													// runs a single poof, and removes it if it is done
      
      if (p.radius == 0)									// if the iterations are over
          poofList = poofList.filter(each => (each != p))	// remove it (and only it) from the list
    }
    
    poofList.foreach(p => runAndRemove(p))
  }
    
  // make a new Poof at the given location, and add it to the list
  def <<< (loc: Vector) { poofList = List(new Poof(loc, parent)) ++ poofList }
}
