import React, { useState, useEffect } from 'react';
import './App.css';
import ResponsiveAppBar from './components/navbars/navbar';
import LoginForm from './components/forms/login';

function App() {

useEffect(() => {
  // Fetch data from the Laravel API running on localhost:8000
  fetch('http://localhost:8000/')
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      // setUsers(data); // Assuming the response is an array of users
      // setLoading(false);
      console.log(data);
    })
    .catch(err => {
      console.log("Error!!!");
      // setError(err.message);
      // setLoading(false);
    });
}, []);

  return (
    <>
      <ResponsiveAppBar />
    </>
  );
}

export default App;
