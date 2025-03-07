import React, { useState } from 'react';
import { TextField, Button, FormControl, InputLabel, Select, MenuItem, Checkbox, FormControlLabel, Grid2, Container, Typography } from '@mui/material';

function LoginForm({setUser}) {

  const [error, setError] = useState(null);

  const [formData, setFormData] = useState({
    email: '',
    password: ''
  });

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
  };

  return (
    <form onSubmit={handleSubmit} style={{margin: '60px 0'}}>
    <Typography variant='h4' pb={2} component="h1" sx={{textAlign: 'center'}}>
        Log Into Your Account
    </Typography>
    <Typography variant='body1' pb={5} sx={{textAlign: 'center', color: '#555'}}>
        Welcome back! Log in to continue and rejoin our thriving community.
    </Typography>
      <Container maxWidth="sm">
        <Grid2 container spacing={2}>

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
                    Login
                </Button>
            </Grid2>
        </Grid2>
      </Container>
    </form>
  );
}

export default LoginForm;
