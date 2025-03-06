import * as React from 'react';
import { BrowserRouter as Router, Route, Routes, Link } from 'react-router-dom';
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import IconButton from '@mui/material/IconButton';
import Typography from '@mui/material/Typography';
import Menu from '@mui/material/Menu';
import MenuIcon from '@mui/icons-material/Menu';
import Container from '@mui/material/Container';
import MenuItem from '@mui/material/MenuItem';
import RegisterForm from '../forms/register';
import LoginForm from '../forms/login';

const pages = ['Home', 'Products', 'Login', 'Register'];

function ResponsiveAppBar() {
  const [anchorElNav, setAnchorElNav] = React.useState(null);

  const handleOpenNavMenu = (event) => {
    setAnchorElNav(event.currentTarget);
  };

  const handleCloseNavMenu = () => {
    setAnchorElNav(null);
  };

  return (


    <Router>
      <div>
        <AppBar position="static">
          <Container maxWidth="xl">
            <Toolbar>
              <Link to='/'
              style={{textDecoration: 'none'}}
              >
                <Typography
                  variant="h6"
                  noWrap
                  sx={{
                    mr: 2,
                    display: { xs: 'none', md: 'flex' },
                    fontFamily: 'roboto',
                    fontWeight: 700,
                    letterSpacing: '.3rem',
                    color: '#FFFFFF',
                    
                  }}
                >
                  E-Commerce
                </Typography>
              </Link>

              <Box sx={{ flexGrow: 1, display: { xs: 'flex', md: 'none' } }}>
                <IconButton
                  size="large"
                  aria-label="account of current user"
                  aria-controls="menu-appbar"
                  aria-haspopup="true"
                  onClick={handleOpenNavMenu}
                  color="inherit"
                >
                  <MenuIcon />
                </IconButton>
                <Menu
                  id="menu-appbar"
                  anchorEl={anchorElNav}
                  anchorOrigin={{
                    vertical: 'bottom',
                    horizontal: 'left',
                  }}
                  keepMounted
                  transformOrigin={{
                    vertical: 'top',
                    horizontal: 'left',
                  }}
                  open={Boolean(anchorElNav)}
                  onClose={handleCloseNavMenu}
                  sx={{ display: { xs: 'block', md: 'none' } }}
                >
                  {pages.map((page) => (
                    <MenuItem key={page} onClick={handleCloseNavMenu}>
                      <Typography sx={{ textAlign: 'center' }}>{page}</Typography>
                    </MenuItem>
                  ))}
                </Menu>
              </Box>

              <Link to='/'
              style={{textDecoration: 'none'}}>
                <Typography
                  variant="h5"
                  noWrap
                  sx={{
                    mr: 2,
                    display: { xs: 'flex', md: 'none' },
                    flexGrow: 1,
                    fontFamily: 'monospace',
                    fontWeight: 700,
                    letterSpacing: '.3rem',
                    color: '#FFFFFF',
                  }}
                >
                  E-Commerce
                </Typography>
              </Link>

              {/* Desktop */}

              <Box sx={{ flexGrow: 1, display: { xs: 'none', md: 'flex' }, justifyContent: 'flex-end' }}>
                {pages.map((page) => (
                  <Link 
                    to={'/' + page.toLowerCase()}
                    key={page}
                    onClick={handleCloseNavMenu}
                    style={{ marginLeft: '20px', textDecoration: 'none', color: 'white', display: 'block', fontSize: '16px' }}
                  >
                    {page}
                  </Link>
                ))}
              </Box>
            </Toolbar>
          </Container>
        </AppBar>

        <Routes>
          <Route path="/" element={<p>Home Page</p>} />
          <Route path="/products" element={<p>Products Page</p>} />
          <Route path="/login" element={<LoginForm />} />
          <Route path="/register" element={<RegisterForm />} />
        </Routes>
      </div>
    </Router>

  );
}
export default ResponsiveAppBar;
