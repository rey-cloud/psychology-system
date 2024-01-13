<!-- components/AdminProfile.vue -->

<template>
    <div>
      <h1>Admin Profile</h1>
      <div>
        <p><strong>Name:</strong> {{ admin.name }}</p>
        <p><strong>Username:</strong> {{ admin.username }}</p>
        <p><strong>Email:</strong> {{ admin.email }}</p>
      </div>
      <div>
        <button @click="changePassword">Change Password</button>
      </div>
      <div>
        <button @click="logout">Logout</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        admin: {
          name: 'John Doe',
          username: 'admin123',
          email: 'admin@example.com',
        },
      };
    },
    methods: {
      changePassword() {
        // For simplicity, let's assume you have a state variable to manage the current password
        const currentPassword = prompt('Enter current password:');
        const newPassword = prompt('Enter new password:');
  
        // Check if the current password is correct (you should validate it against your backend)
        if (currentPassword === 'correctpassword') {
          // Update the password in your backend (you should make an API call here)
          console.log('Changing password...');
          // In a real app, you would send an API request to update the password
          // For demonstration, we'll just log a message here
        } else {
          console.log('Incorrect current password');
        }
      },
      logout() {
        // Add logic to handle logout (clear user session, redirect, etc.)
        console.log('Logging out...');
      },
    },
  };
  </script>
  