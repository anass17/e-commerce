import React, { useState } from 'react';
import { Navigate } from 'react-router-dom';
import { TextField, Button, FormControl, InputLabel, Select, MenuItem, Checkbox, FormControlLabel, Grid2, Container, Typography } from '@mui/material';

const getCSRFToken = () => {
  return document.cookie
    .split('; ')
    .find(row => row.startsWith('XSRF-TOKEN='))
    ?.split('=')[1];
};

const csrfToken = getCSRFToken();  // Get CSRF token from cookies

function RegisterForm() {
  const [status, setStatus] = useState({type: null, message: ''});

  const [formData, setFormData] = useState({
    firstName: '',
    lastName: '',
    email: '',
    password: ''
  });

  if (status.type == 'success') {
    return (<Navigate to="/" />)
  }

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    fetch('http://localhost:8000/api/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-XSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
          setStatus({type: data.status, message: data.message});
        })
        .catch(error => console.error('Error:', error));
  };

  return (
    <form onSubmit={handleSubmit} style={{margin: '60px 0'}}>
      <Typography variant='h4' pb={2} component="h1" sx={{textAlign: 'center'}}>
          Create an Account
      </Typography>
      <Typography variant='body1' pb={2} sx={{textAlign: 'center', color: '#555'}}>
          Sign up today and become a part of our growing community!
      </Typography>
      <Typography variant='body1' pb={3} sx={{textAlign: 'center', color: 'red'}}>
          {status.message}
      </Typography>
      <Container maxWidth="sm" pt={3}>
        <Grid2 container spacing={2}>

        {/* <input type="hidden" name="_token" value="{{ csrf_token() }}"> */}

            <Grid2 size={{ xs: 12, sm: 6 }}>
                <TextField
                    label="First Name"
                    variant="outlined"
                    fullWidth
                    name="firstName"
                    value={formData.firstName}
                    onChange={handleChange}
                />
            </Grid2>

            <Grid2 size={{ xs: 12, sm: 6 }}>
                <TextField
                    label="Last Name"
                    variant="outlined"
                    fullWidth
                    name="lastName"
                    value={formData.lastName}
                    onChange={handleChange}
                />
            </Grid2>

            <Grid2 size={12}>
                <TextField
                    label="Email"
                    variant="outlined"
                    fullWidth
                    name="email"
                    value={formData.email}
                    onChange={handleChange}
                />
            </Grid2>

            <Grid2 size={12}>
                <TextField
                    label="Password"
                    variant="outlined"
                    fullWidth
                    type="password"
                    name="password"
                    onChange={handleChange}
                />
            </Grid2>

            <Grid2 size={3}>
                <Button type="submit" size="large" variant="contained" color="primary" fullWidth>
                    Register
                </Button>
            </Grid2>
        </Grid2>
      </Container>
    </form>
  );
}

export default RegisterForm;
