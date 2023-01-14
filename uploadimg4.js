console.log("start");
  
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";
  
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-analytics.js";
  
  import { getStorage, ref, uploadBytesResumable, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-storage.js";

  import { getFirestore, doc, updateDoc, getDoc, setDoc, collection, addDoc, serverTimestamp  } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
  

  
  // https://firebase.google.com/docs/web/setup#available-libraries
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    authDomain: "petik-357402.firebaseapp.com",
    projectId: "petik-357402",
    storageBucket: "petik-357402.appspot.com",
    messagingSenderId: "361499100540",
    appId: "1:361499100540:web:af4233dd53e4bab0f750f9",
    measurementId: "G-GPSTS95XWC"
  };
  
   // Initialize Firebase
const app = initializeApp(firebaseConfig);
// Initialize Cloud Storage and get a reference to the service
const storage = getStorage(app);

const btns = document.querySelectorAll('.btn1');

  btns.forEach( function (i) {
  i.addEventListener('click', async function(e)    
    {    
      console.log("start function",this.id);
      
////////////////////////////////////////////////////////////////////////////////////////////////  upload Vet  ///////////////////////////////////////////////////////////////////
if(this.id ==  "vetupload"){
  console.log("inside statement", this.id);
  document.getElementById('vetsform').onsubmit=function()
  {
    console.log (document.getElementById('Name').value);
    console.log (document.getElementById('Number').value);
    console.log (document.getElementById('Email').value);
    console.log (document.getElementById('Description').value);
    console.log (document.querySelector("[name='Sundaytime']").value);
    console.log (document.querySelector("[name='Mondayt']").value);
    console.log (document.querySelector("[name='Tuesdaytime']").value);
    console.log (document.querySelector("[name='Wednesdaytime']").value);
    console.log (document.querySelector("[name='Thursdaytime']").value);
    console.log (document.querySelector("[name='Fridaytime']").value);
    console.log (document.querySelector("[name='Saturdaytime']").value);
    return false;
  };


var addedDocRef = document.getElementById('Name').value;
var Number = document.getElementById('Number').value;
var Email = document.getElementById('Email').value;
var Description = document.getElementById('Description').value;
var sunday = document.querySelector("[name='Sundaytime']").value;
var monday = document.querySelector("[name='Mondayt']").value;
var tuesday = document.querySelector("[name='Tuesdaytime']").value;
var wednesday = document.querySelector("[name='Wednesdaytime']").value;
var thursday =document.querySelector("[name='Thursdaytime']").value;
var friday =document.querySelector("[name='Fridaytime']").value;
var saturday =document.querySelector("[name='Saturdaytime']").value;


var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
var vets="vets";
console.log( "checkuser",col);
console.log("user_id",docu);
console.log("vet name",addedDocRef);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref2 = doc(db, col, docu, vets, addedDocRef); // reference to the created product document
const adminref = doc(db, 'vet',addedDocRef); // reference to the created product document


      const docRef = imageref2;
      const docSnap = await getDoc(docRef);
      

      if (docSnap.exists()) {
        console.log("document takin!");
            console.log("stopped");
            alert("you already added this vet");
            return;
            
      }
      else

    console.log("button id", this.id);

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","vetimages/");
        var imgid = '#prodimg';
        console.log("folder",folderpath);
        console.log("imgid",imgid);
        console.log(this.id);
        console.log("addedDocRef",addedDocRef);
    


var file = document.querySelector(imgid).files[0];
var name = new Date() +'-'+file.name;
const metadata = {
contentType: file.type//change to 'image/jpeg',//add size 
};
// Upload the file and metadata

const storageRef = ref(storage, folderpath + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);
uploadTask.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      await setDoc(imageref2, {   //adds the vet info
      Name: addedDocRef,
      vetimglink: downloadURL,
      Description: Description,
      Number: Number,
      Email: Email,
      Sunday: sunday,
      Monday: monday,
      Tuesday: tuesday,
      Wednesday: wednesday,
      Thursday: thursday,
      Friday: friday,
      Saturday: saturday,
      });

      await setDoc(adminref, {   //adds the vet info
        clinic: docu,
        Sunday: sunday,
        Monday: monday,
        Tuesday: tuesday,
        Wednesday: wednesday,
        Thursday: thursday,
        Friday: friday,
        Saturday: saturday,
        });

      
      console.log("savedvet",this.id);
alert("successfully added vet");
window.location.replace("http://localhost/gfs/userpage/listofvets.php");
          });
}
);
} //end of upload Vet

////////////////////////////////////////////////////////////////////////////////////////////////  upload product  ///////////////////////////////////////////////////////////////////

     else if(this.id ==  "uploadprod"){
      document.getElementById('myform').onsubmit=function()
      {
        console.log (document.getElementById('Name').value);
        console.log (document.getElementById('Category').value);
        console.log (document.getElementById('Price').value);
        console.log (document.getElementById('Stock').value);
        console.log (document.getElementById('Description').value);
        return false;
      };
var addedDocRef = document.getElementById('Name').value;
var Category = document.getElementById('Category').value;
var Price = document.getElementById('Price').value;
var Stock = document.getElementById('Stock').value;
var Description = document.getElementById('Description').value;

if (addedDocRef  && 
    Category && 
     Price && 
     Stock && 
    Description) 
  {
   
console.log( "AAAAAAAAAAAAAAAAAAAAAAAAb////////////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAa");

console.log("addedDocRef",addedDocRef);
console.log("Category",Category);
console.log("Price",Price);
console.log("Stock",Stock);
console.log("Description",Description);

console.log( "AAAAAAAAAAAAAAAAAAAAAAAAb/////////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAa");

var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
var products="products";
console.log( "checkuser",col);
console.log("user_id",docu);
console.log("product name",addedDocRef);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref2 = doc(db, col, docu, products, addedDocRef); // reference to the created product document

          const docRef = imageref2;
          const docSnap = await getDoc(docRef);
          

          if (docSnap.exists()) {
            console.log("document takin!");
                console.log("stopped");
                alert("you already added this product");
                return;
                
          }
          else

          

        console.log("button id", this.id);

      
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
        // imagesRef now points to 'usertypes'
        
            var folderhead = 'usertypes/';
            var folderpath = folderhead.concat(col,"/",docu,"/","prodimages/");
            var imgid = '#prodimg';
            var imgid2 = '#prodimg2';
            var imgid3 = '#prodimg3';
            var imgid4 = '#prodimg4';
            console.log("folder",folderpath);
            console.log("imgid",imgid);
            console.log(this.id);
            console.log("addedDocRef",addedDocRef);
        


var file = document.querySelector(imgid).files[0];

var file2 = document.querySelector(imgid2).files[0];

var file3 = document.querySelector(imgid3).files[0];

var file4 = document.querySelector(imgid4).files[0];

var name = new Date() +'-'+file.name;
const metadata = {
  contentType: file.type//change to 'image/jpeg',//add size 
};
const metadata2 = {
  contentType: file2.type  //add size metadata
  };
const metadata3 = {
  contentType: file3.type  //add size metadata
  };
const metadata4 = {
  contentType: file4.type  //add size metadata
  };
// Upload the file and metadata

const storageRef = ref(storage, folderpath + file.name);

const storageRef2 = ref(storage, folderpath + file2.name);

const storageRef3 = ref(storage, folderpath + file3.name);

const storageRef4 = ref(storage, folderpath + file4.name);

const uploadTask = uploadBytesResumable(storageRef, file, metadata);
const uploadTask2 = uploadBytesResumable(storageRef2, file2, metadata2);
const uploadTask3 = uploadBytesResumable(storageRef3, file3, metadata3);
const uploadTask4 = uploadBytesResumable(storageRef4, file4, metadata4);

uploadTask.on('state_changed',
  (snapshot) => {
    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
    const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
    console.log('Upload is ' + progress + '% done');
    switch (snapshot.state) {
      case 'paused':
        console.log('Upload is paused');
        break;
      case 'running':
        console.log('Upload is running');
        break;
    }
  }, 
  (error) => {
    // A full list of error codes is available at
    // https://firebase.google.com/docs/storage/web/handle-errors
    switch (error.code) {
      case 'storage/unauthorized':
        // User doesn't have permission to access the object
        break;
      case 'storage/canceled':
        // User canceled the upload
        break;
      // ...
      case 'storage/unknown':
        // Unknown error occurred, inspect error.serverResponse
        break;
    }
  }, 
  () => {

            // Upload completed successfully, now we can get the download URL
            getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
              console.log('File available at', downloadURL);

            // doc.data() will be undefined in this case
            //document.querySelector('#display3').src = downloadURL;
          //document.querySelector('#image').value = "";

          await setDoc(imageref2, {   //adds the product info
          Name: addedDocRef,
          prodimglink: downloadURL,
          Category: Category,
          Price: Price,
          Stock: Stock,
          Description: Description,
          
          }, { merge: true });

          console.log("savedprod",this.id)

              });
            
  

  }
);
///////////////////////////////////////

uploadTask2.on('state_changed',
  (snapshot) => {
    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
    const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
    console.log('Upload is ' + progress + '% done');
    switch (snapshot.state) {
      case 'paused':
        console.log('Upload is paused');
        break;
      case 'running':
        console.log('Upload is running');
        break;
    }
  }, 
  (error) => {
    // A full list of error codes is available at
    // https://firebase.google.com/docs/storage/web/handle-errors
    switch (error.code) {
      case 'storage/unauthorized':
        // User doesn't have permission to access the object
        break;
      case 'storage/canceled':
        // User canceled the upload
        break;
      // ...
      case 'storage/unknown':
        // Unknown error occurred, inspect error.serverResponse
        break;
    }
  }, 
  () => {

            // Upload completed successfully, now we can get the download URL
            getDownloadURL(uploadTask2.snapshot.ref).then( async (downloadURL) => {
              console.log('File available at', downloadURL);

            // doc.data() will be undefined in this case
            //document.querySelector('#display3').src = downloadURL;
          //document.querySelector('#image').value = "";

          await setDoc(imageref2, {   //adds the product info
          Name: addedDocRef,
          prodimglink2: downloadURL,
          Category: Category,
          Price: Price,
          Stock: Stock,
          Description: Description,
          }, { merge: true });

          console.log("savedprod",this.id);

              });
            
  

  }
);

///////////////////////////////////////

uploadTask3.on('state_changed',
  (snapshot) => {
    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
    const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
    console.log('Upload is ' + progress + '% done');
    switch (snapshot.state) {
      case 'paused':
        console.log('Upload is paused');
        break;
      case 'running':
        console.log('Upload is running');
        break;
    }
  }, 
  (error) => {
    // A full list of error codes is available at
    // https://firebase.google.com/docs/storage/web/handle-errors
    switch (error.code) {
      case 'storage/unauthorized':
        // User doesn't have permission to access the object
        break;
      case 'storage/canceled':
        // User canceled the upload
        break;
      // ...
      case 'storage/unknown':
        // Unknown error occurred, inspect error.serverResponse
        break;
    }
  }, 
  () => {

            // Upload completed successfully, now we can get the download URL
            getDownloadURL(uploadTask3.snapshot.ref).then( async (downloadURL) => {
              console.log('File available at', downloadURL);

            // doc.data() will be undefined in this case
            //document.querySelector('#display3').src = downloadURL;
          //document.querySelector('#image').value = "";

          await setDoc(imageref2, {   //adds the product info
          Name: addedDocRef,
          prodimglink3: downloadURL,
          Category: Category,
          Price: Price,
          Stock: Stock,
          Description: Description,
          }, { merge: true });

          console.log("savedprod",this.id);

              });
            
  

  }
);

///////////////////////////////////////

uploadTask4.on('state_changed',
  (snapshot) => {
    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
    const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
    console.log('Upload is ' + progress + '% done');
    switch (snapshot.state) {
      case 'paused':
        console.log('Upload is paused');
        break;
      case 'running':
        console.log('Upload is running');
        break;
    }
  }, 
  (error) => {
    // A full list of error codes is available at
    // https://firebase.google.com/docs/storage/web/handle-errors
    switch (error.code) {
      case 'storage/unauthorized':
        // User doesn't have permission to access the object
        break;
      case 'storage/canceled':
        // User canceled the upload
        break;
      // ...
      case 'storage/unknown':
        // Unknown error occurred, inspect error.serverResponse
        break;
    }
  }, 
  () => {

            // Upload completed successfully, now we can get the download URL
            getDownloadURL(uploadTask4.snapshot.ref).then( async (downloadURL) => {
              console.log('File available at', downloadURL);

            // doc.data() will be undefined in this case
            //document.querySelector('#display3').src = downloadURL;
          //document.querySelector('#image').value = "";

          await setDoc(imageref2, {   //adds the product info
          Name: addedDocRef,
          prodimglink4: downloadURL,
          Category: Category,
          Price: Price,
          Stock: Stock,
          Description: Description,
          }, { merge: true });

          console.log("savedprod",this.id);

          alert("successfully added prod");

              });
            
  

  }
);
  }

  else
  {
    alert("fill out all fields");
    return;
  }

} //end of upload product
////////////////////////////////////////////////////////////////////////////////////////////////  upload services  ///////////////////////////////////////////////////////////////////

else if(this.id ==  "uploadserv"){
  document.getElementById('servform').onsubmit=function()
  {
    console.log (document.getElementById('Name').value);
    console.log (document.getElementById('Category').value);
    console.log (document.getElementById('Price').value);
    console.log (document.getElementById('Vet').value);
    console.log (document.getElementById('Description').value);
    return false;
  };
var addedDocRef = document.getElementById('Name').value;
var Category = document.getElementById('Category').value;
var Price = document.getElementById('Price').value;
var Vet = document.getElementById('Vet').value;
var Description = document.getElementById('Description').value;


var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
var services="services";
console.log( "checkuser",col);
console.log("user_id",docu);
console.log("service name",addedDocRef);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref2 = doc(db, col, docu, services, addedDocRef); // reference to the created product document

      const docRef = imageref2;
      const docSnap = await getDoc(docRef);
      

      if (docSnap.exists()) {
        console.log("document takin!");
            console.log("stopped");
            alert("you already added this service");
            return;
            
      }
      else

    console.log("button id", this.id);

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","servimages/");
        var imgid = '#prodimg';
        console.log("folder",folderpath);
        console.log("imgid",imgid);
        console.log(this.id);
        console.log("addedDocRef",addedDocRef);
    


var file = document.querySelector(imgid).files[0];
var name = new Date() +'-'+file.name;
const metadata = {
contentType: file.type//change to 'image/jpeg',//add size 
};
// Upload the file and metadata

const storageRef = ref(storage, folderpath + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);
uploadTask.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      await setDoc(imageref2, {   //adds the product info
      Name: addedDocRef,
      servimglink: downloadURL,
      Category: Category,
      Price: Price,
      Vet: Vet,
      Description: Description,
      });

      console.log("savedservice",this.id);
alert("successfully added service");
window.location.replace("http://localhost/gfs/userpage/listofservices.php");
          });
        


}
);
} //end of upload services
////////////////////////////////////////////////////////////////////////////////////////////////  upload pet  ///////////////////////////////////////////////////////////////////

else if(this.id ==  "uploadpet"){
  document.getElementById('petform').onsubmit=function()
  {
    console.log (document.getElementById('Name').value);
    console.log (document.getElementById('Category').value);
    console.log (document.getElementById('Price').value);
    console.log (document.getElementById('Breed').value);
    console.log (document.getElementById('Sex').value);
    console.log (document.getElementById('Color').value);
    console.log (document.getElementById('Eye').value);
    console.log (document.getElementById('Weight').value);
    console.log (document.getElementById('Birthdate').value);
    console.log (document.getElementById('Age').value);
    console.log (document.getElementById('Description').value);


    

    
    return false;
  };
var addedDocRef = document.getElementById('Name').value;
var Category = document.getElementById('Category').value;
var Price = document.getElementById('Price').value;
var Breed = document.getElementById('Breed').value;
var Sex = document.getElementById('Sex').value;
var Color = document.getElementById('Color').value;
var Eye = document.getElementById('Eye').value;
var Weight = document.getElementById('Weight').value;
var Birthdate = document.getElementById('Birthdate').value;
var Age = document.getElementById('Age').value;
var Description = document.getElementById('Description').value;


const endageredpets = [
  'Philippine Eagle',
  'Hawksbill Sea Turtle',
  'Long Polyp Green',
  'Green Turtle',
  'Calamian Deer',
  'Philippine Freshwater Crocodile',
  'The Philippine Tarsie',
  'False Flower Coral',
  'Black Shama',
  'Streak-breasted Bulbul',
  'Tamaraw',
  'Philippine Spotted Deer',
  'Sei Whale',
  'Panay Crateromys',
  'Catanduanes Narrow-mouthed Frog',
  'Walden Hornbill',
  'Sulu Hornbill',
  'Blue Whale',
  'Negros Shrew',
  'Philippine Tube-nosed Fruit Bat',
  'Visayan Warty Pig',
  'Negros Fruit Dove',
  'Fin Whale',
  'Flame-templed Babbler',
  'Luzon Peacock Swallowtail',
  'Philippine Cockatoo',
  'Flame-breasted Fruit Dove',
  'Dinagat Hairy-tailed Rat',
  'White-winged Flying Fox',
  'Frog-faced Softshell Turtle',
  'Negros Bleeding-heart',
  'Giant Clams',
  'Limbless Worm Skink',
  'Mindoro Zone-tailed Pigeon',
  'Tawitawi Brown Dove',
  'Philippine Naked-backed Fruit Bat',
  'Cebu Flowerpecker',
  'Loggerhead Turtle',
  'Japanese Night Heron',
  'Mindoro Tree Frog',
  'Philippine Forest Turtle',
  'Golden-capped Fruit Bat',
  'Dog-faced Water Snake',
  'Apo Swallowtail',
  'Hazels Forest Frog',
  'Dinagat Bushy-tailed Cloud Rat',
  'Net Coral',
  'Humphead Wrasse',
  'Spiny Turtle',
  'Mount Data Forest Frog',
  'Crocodile',
  'Snake',
  'Cobra',
  'Tiger',
  'Lion',
  'Girrafe',
  'Panda',
  'Koala',
  'Tarsher'


];

const endageredpet = document.getElementById('Name').value;

if(endageredpets.includes(endageredpet))
{
  alert("This pet is considered as an endagered species you cannot add this pet");
  console.log("This pet is considered as an endagered species you cannot add this pet");
  return;
  
}

var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
var pets="pets";
console.log( "checkuser",col);
console.log("user_id",docu);
console.log("pet name",addedDocRef);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref2 = doc(db, col, docu, pets, addedDocRef); // reference to the created product document
const imageref3 = doc(db, 'endageredpet', addedDocRef); // reference to the created product document

      const docRef = imageref2;
      const docSnap = await getDoc(docRef);
      const docRef3 = imageref3;
      const docSnap3 = await getDoc(docRef3);

      if (docSnap.exists()) {
        console.log("document takin!");
            console.log("stopped");
            alert("you already added this pet");
            return;
            
      }
      else if (docSnap3.exists()) {
        alert("This pet is considered as an endagered species you cannot add this pet");
            console.log("stopped");
            alert("you already added this pet");
            return;
            
      }
      else

      

    console.log("button id", this.id);

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","petimages/");
        var imgid = '#petimg';
        console.log("folder",folderpath);
        console.log("imgid",imgid);
        console.log(this.id);
        console.log("addedDocRef",addedDocRef);
    


var file = document.querySelector(imgid).files[0];
//var name = new Date() +'-'+file.name;
const metadata = {
contentType: file.type //change to 'image/jpeg',//add size 
};
// Upload the file and metadata

const storageRef = ref(storage, folderpath + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);
uploadTask.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      await setDoc(imageref2, {   //adds the product info
      petimglink: downloadURL,
      Category: Category,
      Price: Price,
      Name: addedDocRef,
      Breed: Breed,
      Sex: Sex,
      Color: Color,
      Eye: Eye,
      Weight: Weight,
      Birthdate: Birthdate,
      Age: Age,
      Description: Description,
      });

      console.log("savedpet",this.id);
alert("successfully added pet");

          });
        


}
);
} //end of upload pet
////////////////////////////////////////////////////////////////////////////////////////////////  update pet  ///////////////////////////////////////////////////////////////////

else if(this.id ==  "uploadendangeredpet"){
  document.getElementById('petform').onsubmit=function()
  {
    console.log (document.getElementById('Name').value);

    return false;
  };
var addedDocRef = document.getElementById('Name').value;



// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref2 = doc(db, 'endageredpet', addedDocRef); // reference to the created product document


      await setDoc(imageref2, {   //adds the product info
      Name: addedDocRef
      });

      console.log("savedpet",this.id);
alert("successfully added endangered pet");

          
      
} //end of endagered upload pet
////////////////////////////////////////////////////////////////////////////////////////////////  endangered update pet  ///////////////////////////////////////////////////////////////////

else if(this.id ==  "vieweditpet"){

  console.log ("id",this.id);
  document.getElementById('viewform').onsubmit=function()
  {
    console.log (document.getElementById('Category').value);
    console.log (document.getElementById('Price').value);
    console.log (document.getElementById('Breed').value);
    console.log (document.getElementById('Sex').value);
    console.log (document.getElementById('Color').value);
    console.log (document.getElementById('Eye').value);
    console.log (document.getElementById('Weight').value);
    console.log (document.getElementById('Birthdate').value);
    console.log (document.getElementById('Age').value);
    console.log (document.getElementById('Description').value);
    return false;
  };
var addedDocRef = document.getElementById('Name').value;
var Category = document.getElementById('Category').value;
var Price = document.getElementById('Price').value;
var Breed = document.getElementById('Breed').value;
var Sex = document.getElementById('Sex').value;
var Color = document.getElementById('Color').value;
var Eye = document.getElementById('Eye').value;
var Weight = document.getElementById('Weight').value;
var Birthdate = document.getElementById('Birthdate').value;
var Age = document.getElementById('Age').value;
var Description = document.getElementById('Description').value;


var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
var pets="pets";
console.log( "checkuser",col);
console.log("user_id",docu);
console.log("pet name",addedDocRef);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref2 = doc(db, col, docu, pets, addedDocRef); // reference to the created product document


console.log("update id", this.id);

      await updateDoc(imageref2, {   //adds the product info
        Category: Category,
        Price: Price,
        Breed: Breed,
        Sex: Sex,
        Color: Color,
        Eye: Eye,
        Weight: Weight,
        Birthdate: Birthdate,
        Age: Age,
        Description: Description,
        });
    console.log("updated id", this.id);
    alert("succesfully updated");

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","petimages/");
        var imgid = '#petimg';
        console.log("folder",folderpath);
        console.log("imgid",imgid);
        console.log(this.id);
        console.log("addedDocRef",addedDocRef);
    


var file = document.querySelector(imgid).files[0];
//var name = new Date() +'-'+file.name;
const metadata = {
contentType: file.type //change to 'image/jpeg',//add size 
};
// Upload the file and metadata

const storageRef = ref(storage, folderpath + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);
uploadTask.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      await updateDoc(imageref2, {   //adds the product info
      petimglink: downloadURL
      });

      console.log("savedpet",this.id);
alert("successfully added pet");

          });
        


}
);
} //end of update pet

////////////////////////////////////////////////////////////////////////////////////////////////  update product  ///////////////////////////////////////////////////////////////////

else if(this.id ==  "vieweditprod"){

  console.log ("id",this.id);
  document.getElementById('myform').onsubmit=function()
  {
    console.log (document.getElementById('Name').value);
    console.log (document.getElementById('Category').value);
    console.log (document.getElementById('Price').value);
    console.log (document.getElementById('Stock').value);
    console.log (document.getElementById('Description').value);
    return false;
  };
var addedDocRef = document.getElementById('Name').value;
var Category = document.getElementById('Category').value;
var Price = document.getElementById('Price').value;
var Stock = document.getElementById('Stock').value;
var Description = document.getElementById('Description').value;


if (addedDocRef  && 
  Category && 
   Price && 
   Stock && 
  Description) 
{

var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
var products="products";
console.log( "checkuser",col);
console.log("user_id",docu);
console.log("product name",addedDocRef);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref2 = doc(db, col, docu, products, addedDocRef); // reference to the created product document


console.log("update id", this.id);

      await updateDoc(imageref2, {   //adds the product info
        Category: Category,
        Price: Price,
        Stock: Stock,
        Description: Description,
        });
    console.log("updated id", this.id);
    alert("successfully edited product");

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","prodimages/");
        var imgid = '#prodimg';
        var imgid2 = '#prodimg2';
        var imgid3 = '#prodimg3';
        var imgid4 = '#prodimg4';
        console.log("folder",folderpath);
        console.log("imgid",imgid);
        console.log(this.id);
        console.log("addedDocRef",addedDocRef);
  var count = 0 ;

if(document.querySelector(imgid).files[0])
{

  var file = document.querySelector(imgid).files[0];
  
  console.log("DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD");
  const metadata = {
    contentType: file.type //change to 'image/jpeg',//add size 
    };
    
const storageRef = ref(storage, folderpath + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);

uploadTask.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      await updateDoc(imageref2, {   //adds the product info
      prodimglink: downloadURL
      });

      console.log("savedprod",this.id);
      count++;
          });
        


}
);

}

if(document.querySelector(imgid2).files[0])
{

  var file2 = document.querySelector(imgid2).files[0];
  
const metadata2 = {
  contentType: file2.type  //add size metadata
  };
  
const storageRef2 = ref(storage, folderpath + file2.name);
const uploadTask2 = uploadBytesResumable(storageRef2, file2, metadata2);

uploadTask2.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask2.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      await updateDoc(imageref2, {   //adds the product info
      prodimglink2: downloadURL
      });

      console.log("savedprod prodimglink2",this.id);
      count++;
          });
        


}
);
}
if(document.querySelector(imgid3).files[0])
{
  
var file3 = document.querySelector(imgid3).files[0];
const metadata3 = {
  contentType: file3.type  //add size metadata
  };
  
const storageRef3 = ref(storage, folderpath + file3.name);
const uploadTask3 = uploadBytesResumable(storageRef3, file3, metadata3);

uploadTask3.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask3.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      await updateDoc(imageref2, {   //adds the product info
      prodimglink3: downloadURL
      });

      console.log("savedprod",this.id);
      count++;
          });
        


}
);
}
if(document.querySelector(imgid4).files[0])
{

  var file4 = document.querySelector(imgid4).files[0];
  
const metadata4 = {
  contentType: file4.type  //add size metadata
  };
// Upload the file and metadata

const storageRef4 = ref(storage, folderpath + file4.name);

const uploadTask4 = uploadBytesResumable(storageRef4, file4, metadata4);




uploadTask4.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask4.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      await updateDoc(imageref2, {   //adds the product info
      prodimglink4: downloadURL
      });

      console.log("savedprod",this.id);
      //alert("successfully edited prod");
      count++;
          });
        


}
);
}
//var name = new Date() +'-'+file.name;
if(count!=0)
{
  alert("successfully edited prod");
}
}
else
  {
    alert("fill out all fields");
    return;
  }

} //end of update product
////////////////////////////////////////////////////////////////////////////////////////////////  update service  ///////////////////////////////////////////////////////////////////

else if(this.id ==  "vieweditserv"){

  console.log ("id",this.id);
  document.getElementById('servform2').onsubmit=function()
  {
    console.log (document.getElementById('Name').value);
    console.log (document.getElementById('Category').value);
    console.log (document.getElementById('Price').value);
    console.log (document.getElementById('Vet').value);
    console.log (document.getElementById('Description').value);
    return false;
  };
var addedDocRef = document.getElementById('Name').value;
var Category = document.getElementById('Category').value;
var Price = document.getElementById('Price').value;
var Vet = document.getElementById('Vet').value;
var Description = document.getElementById('Description').value;


var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
var services="services";
console.log( "checkuser",col);
console.log("user_id",docu);
console.log("service name",addedDocRef);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref2 = doc(db, col, docu, services, addedDocRef); // reference to the created product document


console.log("update id", this.id);

      await updateDoc(imageref2, {   //updates the service info
        Category: Category,
        Price: Price,
        Vet: Vet,
        Description: Description,
        });
    console.log("updated id", this.id);
    alert("sucessfully edited");

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","servimages/");
        var imgid = '#prodimg';
        console.log("folder",folderpath);
        console.log("imgid",imgid);
        console.log(this.id);
        console.log("addedDocRef",addedDocRef);
    


var file = document.querySelector(imgid).files[0];
//var name = new Date() +'-'+file.name;
const metadata = {
contentType: file.type //change to 'image/jpeg',//add size 
};
// Upload the file and metadata

const storageRef = ref(storage, folderpath + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);
uploadTask.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      await updateDoc(imageref2, {   //adds the product info
      servimglink: downloadURL
      });

      console.log("savedprod",this.id);

          });
        


}
);
} //end of update service
////////////////////////////////////////////////////////////////////////////////////////////////  update vet  ///////////////////////////////////////////////////////////////////

else if(this.id ==  "vieweditvet"){

  console.log ("id",this.id);
  document.getElementById('vetform2').onsubmit=function()
  {
    console.log (document.getElementById('Name').value);
    console.log (document.getElementById('Number').value);
    console.log (document.getElementById('Email').value);
    console.log (document.getElementById('Description').value);
    console.log (document.querySelector("[name='Sundaytime']").value);
    console.log (document.querySelector("[name='Mondayt']").value);
    console.log (document.querySelector("[name='Tuesdaytime']").value);
    console.log (document.querySelector("[name='Wednesdaytime']").value);
    console.log (document.querySelector("[name='Thursdaytime']").value);
    console.log (document.querySelector("[name='Fridaytime']").value);
    console.log (document.querySelector("[name='Saturdaytime']").value);
    
    return false;
  };
var addedDocRef = document.getElementById('Name').value;
var Number = document.getElementById('Number').value;
var Email = document.getElementById('Email').value;
var Description = document.getElementById('Description').value;
var sunday = document.querySelector("[name='Sundaytime']").value;
var monday = document.querySelector("[name='Mondayt']").value;
var tuesday = document.querySelector("[name='Tuesdaytime']").value;
var wednesday = document.querySelector("[name='Wednesdaytime']").value;
var thursday =document.querySelector("[name='Thursdaytime']").value;
var friday =document.querySelector("[name='Fridaytime']").value;
var saturday =document.querySelector("[name='Saturdaytime']").value;



var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
var vets="vets";
console.log( "checkuser",col);
console.log("user_id",docu);
console.log("service name",addedDocRef);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref2 = doc(db, col, docu, vets, addedDocRef); // reference to the created product document


console.log("update id", this.id);

      await updateDoc(imageref2, {   //updates the service info
        Number: Number,
        Email: Email,
        Description: Description,
        Sunday: sunday,
        Monday: monday,
        Tuesday: tuesday,
        Wednesday: wednesday,
        Thursday: thursday,
        Friday: friday,
        Saturday: saturday,
        });
    console.log("updated id", this.id);
    alert("sucessfully edited");

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","vetimages/");
        var imgid = '#vetimg';
        console.log("folder",folderpath);
        console.log("imgid",imgid);
        console.log(this.id);
        console.log("addedDocRef",addedDocRef);
    


var file = document.querySelector(imgid).files[0];
//var name = new Date() +'-'+file.name;
const metadata = {
contentType: file.type //change to 'image/jpeg',//add size 
};
// Upload the file and metadata

const storageRef = ref(storage, folderpath + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);
uploadTask.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      await updateDoc(imageref2, {   //adds the product info
      vetimglink: downloadURL
      });

      console.log("savedprod",this.id);
alert("successfully edited vet");

          });
        


}
);
} //end of update vet
////////////////////////////////////////////////////////////////////////////////////////////////  upload_btn logo pic ///////////////////////////////////////////////////////////////////
else if(this.id == "upload_btn")
{




var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
console.log( "checkuser",col);
console.log("user_id",docu);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref = doc(db, col, docu); //change the collention andn document to a session or php variable 


    console.log("button id", this.id);

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","logopic/");
        var imgid = '#image';
        console.log("folderpath",folderpath);
        console.log("imgid",imgid);
        console.log(this.id);


var file = document.querySelector(imgid).files[0];
var name = new Date() +'-'+file.name;
const metadata = {
contentType: file.type //change to 'image/jpeg',//add size 
};
// Upload the file and metadata

const storageRef = ref(storage, folderpath + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);
uploadTask.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      
      document.querySelector('#display').src = downloadURL;
      //document.querySelector('#image').value = "";
      await updateDoc(imageref, {
      imagelink: downloadURL
      });

      console.log("savedprod",this.id);
alert("successfully updated logo pic");

          });
        


}
);

}  //end of upload btn
////////////////////////////////////////////////////////////////////////////////////////////////  upload_btn2 background ///////////////////////////////////////////////////////////////////

else if(this.id == "upload_btn2")
{
  


var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
console.log( "checkuser",col);
console.log("user_id",docu);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref = doc(db, col, docu); //change the collention andn document to a session or php variable 


    console.log("button id", this.id);

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","bgimages/");
        var imgid = '#image2';
        console.log("folderpath",folderpath);
        console.log("imgid",imgid);
        console.log(this.id);


var file = document.querySelector(imgid).files[0];
var name = new Date() +'-'+file.name;
const metadata = {
contentType: file.type //change to 'image/jpeg',//add size 
};
// Upload the file and metadata

const storageRef = ref(storage, folderpath + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);
uploadTask.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {

        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

        // doc.data() will be undefined in this case
        //document.querySelector('#display3').src = downloadURL;
      //document.querySelector('#image').value = "";

      
      document.querySelector('#display2').src = downloadURL;
      //document.querySelector('#image').value = "";
      await updateDoc(imageref, {
        bgimagelink: downloadURL
      });

      console.log("updatedbg",this.id);
alert("successfully updated bg image");

          });
        


}
);


}  //end of upload btn2
////////////////////////////////////////////////////////////////////////////////////////////////////upload docs.////////////////////////////////////
else if(this.id == "uploaddoc")
{
  console.log( "inside",col);
  document.getElementById('docform').onsubmit=function()
  {
    return false;
  };

var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
console.log( "checkuser",col);
console.log("user_id",docu);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
var documents = "documents";
// Add a new document with a generated id


    console.log("button id", this.id);

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","documents/");
        var doc1 = '#bc';
        var doc2 = '#mbp';
        var doc3 = '#bir';
        var doc4 = '#sss';
        var doc5 = '#spa';
        console.log("folderpath",folderpath);

var file1 = document.querySelector(doc1).files[0];
var file2 = document.querySelector(doc2).files[0];
var file3 = document.querySelector(doc3).files[0];
var file4 = document.querySelector(doc4).files[0];
var file5 = document.querySelector(doc5).files[0];
var name = new Date() +'-'+file1.name;
const metadata1 = {
contentType: file1.type  //add size metadata
};
const metadata2 = {
contentType: file2.type  //add size metadata
};
const metadata3 = {
contentType: file3.type  //add size metadata
};
const metadata4 = {
contentType: file4.type  //add size metadata
};
const metadata5 = {
contentType: file5.type  //add size metadata
};
// Upload the file and metadata

const storageRef1 = ref(storage, folderpath + file1.name);
const storageRef2 = ref(storage, folderpath + file2.name);
const storageRef3 = ref(storage, folderpath + file3.name);
const storageRef4 = ref(storage, folderpath + file4.name);
const storageRef5 = ref(storage, folderpath + file5.name);
const uploadTask1 = uploadBytesResumable(storageRef1, file1, metadata1);
const uploadTask2 = uploadBytesResumable(storageRef2, file2, metadata2);
const uploadTask3 = uploadBytesResumable(storageRef3, file3, metadata3);
const uploadTask4 = uploadBytesResumable(storageRef4, file4, metadata4);
const uploadTask5 = uploadBytesResumable(storageRef5, file5, metadata5);

/////////////////////////////////////////////////////////////////////////////////////////////////////// uploadTask1
uploadTask1.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
    
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {
        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask1.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

          const data ={          
             bc:downloadURL
        };
          await updateDoc(doc(db, col, docu, documents, "docufiles"), data);  
          
          
          });
}
);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////uploadTask2
uploadTask2.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
    
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {
        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask2.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

          const data ={          
             mbp:downloadURL
        };
          await updateDoc(doc(db, col, docu, documents, "docufiles"), data);  
          
          
          });
}
);//////////////////////////////////////////////////////////////////////////////////////////////////////uploadTask3
uploadTask3.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
    
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {
        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask3.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

          const data ={          
             bir:downloadURL
        };
          await updateDoc(doc(db, col, docu, documents, "docufiles"), data);  


          
          
          });
}
);/////////////////////////////////////////////////////////////////////////////////////////////////////////uploadTask4
uploadTask4.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
    
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {
        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask4.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

          const data ={          
             sss:downloadURL
        };
          await updateDoc(doc(db, col, docu, documents, "docufiles"), data);  


          
          
          });
}
);///////////////////////////////////////////////////////////////////////////////////////////////////////uploadTask5
uploadTask5.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
console.log('Upload is ' + progress + '% done');
switch (snapshot.state) {
  case 'paused':
    console.log('Upload is paused');
    break;
  case 'running':
    console.log('Upload is running');
    break;
    
}
}, 
(error) => {
// A full list of error codes is available at
// https://firebase.google.com/docs/storage/web/handle-errors
switch (error.code) {
  case 'storage/unauthorized':
    // User doesn't have permission to access the object
    break;
  case 'storage/canceled':
    // User canceled the upload
    break;
  // ...
  case 'storage/unknown':
    // Unknown error occurred, inspect error.serverResponse
    break;
}
}, 
() => {
        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask5.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

          const data ={          
             spa:downloadURL
        };
          await updateDoc(doc(db, col, docu, documents, "docufiles"), data);  


          
          
          });
}
);

} 
    })
  });

