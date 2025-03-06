import React, { useState } from 'react';
import { TextField, Button, FormControl, InputLabel, Select, MenuItem, Checkbox, FormControlLabel, Grid2, Container, Typography } from '@mui/material';

function RegisterForm() {
  const [formData, setFormData] = useState({
    firstName: '',
    lastName: '',
    email: ''
  });

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    fetch('https://localhost:8000/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
        })
        .then(response => response.json())
        .then(data => console.log('Success:', data))
        .catch(error => console.error('Error:', error));
  };

  return (
    <form onSubmit={handleSubmit} style={{margin: '60px 0'}}>
    <Typography variant='h4' pb={2} component="h1" sx={{textAlign: 'center'}}>
        Create an Account
    </Typography>
    <Typography variant='body1' pb={5} sx={{textAlign: 'center', color: '#555'}}>
        Sign up today and become a part of our growing community!
    </Typography>
      <Container maxWidth="sm">
        <Grid2 container spacing={2}>
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
