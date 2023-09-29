# Use an official Node.js runtime as a parent image
FROM node:14

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the package files to the container
COPY ./src/package*.json ./

# Copy the rest of the application source code to the container
COPY ./src .

# Expose a port if your Node.js application listens on a specific port
EXPOSE 3000

# Install application dependencies
# RUN npm install
# RUN npm run dev