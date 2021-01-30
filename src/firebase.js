import firebase from 'firebase';

const firebaseApp = firebase.initializeApp({

    apiKey: "AIzaSyCWIKxm10G_UH5gYVOnpoJNFrqWnDknwIc",
    authDomain: "messenger-clone-14749.firebaseapp.com",
    projectId: "messenger-clone-14749",
    storageBucket: "messenger-clone-14749.appspot.com",
    messagingSenderId: "242877867510",
    appId: "1:242877867510:web:4b3e5917cff0fcaed4d3d7",
    measurementId: "G-HZS8BVXZ7T"


});

const db = firebaseApp.firestore();

export default db;

