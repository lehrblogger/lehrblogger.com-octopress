// Steven Lehrburger - ITP/AJAX/Nolen
// Homework 1        - 9/8/08


console.log("");
console.log("--------------------Part 2--------------------");
console.log("");

var NameObject = {
  __firstName__: "f",
  __lastName__: "l",

  set firstName(x)
  {
    this.__firstName__ = x;
  },
  set lastName(x)
  {
    this.__lastName__ = x;
  },

  get firstName()
  {
    return this.__firstName__;
  },  
  get lastName()
  {
    return this.__lastName__;
  },
  get fullName()
  {
    return this.firstName + " " + this.lastName;
  }

};
console.log(NameObject.firstName);
console.log(NameObject.lastName);
console.log(NameObject.fullName);
NameObject.firstName = "John";
NameObject.lastName = "Smith";
console.log(NameObject.fullName);



console.log("");
console.log("-----OR------");
console.log("");



var NameObject = {
  __firstName__: "f",
  __lastName__: "l",
  fullName: function() {return this.firstName + " " + this.lastName;},

  set firstName(x)
  {
    this.__firstName__ = x;
  },
  set lastName(x)
  {
    this.__lastName__ = x;
  },

  get firstName()
  {
    return this.__firstName__;
  },  
  get lastName()
  {
    return this.__lastName__;
  }
};
console.log(NameObject.firstName);
console.log(NameObject.lastName);
console.log(NameObject.fullName());
NameObject.firstName = "John";
NameObject.lastName = "Smith";
console.log(NameObject.fullName());



console.log("");
console.log("--------------------Part 3--------------------");
console.log("");



function NameConstructor(first, last) {
  this.__firstName__ = first;
  this.__lastName__ = last;
};

NameConstructor.prototype.__defineSetter__("firstName", function(x) { this.__firstName__ = x;});
NameConstructor.prototype.__defineSetter__("lastName",  function(x) { this.__lastName__ = x;});
NameConstructor.prototype.__defineGetter__("firstName", function()  { return this.__firstName__;});
NameConstructor.prototype.__defineGetter__("lastName",  function()  { return this.__lastName__;});
NameConstructor.prototype.__defineGetter__("fullName",  function()  { return this.firstName + " " + this.lastName;;});

var name1 = new NameConstructor("John", "Smith");
var name2 = new NameConstructor("Jane", "Brown");

console.log(name1.firstName);
console.log(name1.lastName);
console.log(name1.fullName);
console.log(name2.firstName);
console.log(name2.lastName);
console.log(name2.fullName);

console.log("-----Switching Names-----");

console.log(name1.firstName);
console.log(name1.lastName);
console.log(name1.fullName);
name1.firstName = name2.lastName;
name1.lastName = name2.firstName;
console.log(name1.firstName);
console.log(name1.lastName);
console.log(name1.fullName);



console.log("");
console.log("--------------------Part 4--------------------");
console.log("");

Array.prototype.filter = function(criteria) {
 var temparray = [];

 while (this.length != 0) {
   var tempval = this.pop();
   if (criteria(tempval)) temparray.push(tempval);
 }

 for (key in temparray)
   this.push(key);
};

var OnlyEvens = function(x) {
   return (x%2 == 0);
} 
var array = [0, 1, 2, 3, 4, 5];
console.log(array);
array.filter(OnlyEvens);
console.log(array);
