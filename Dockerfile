FROM node:18

# Set the working directory inside the container
WORKDIR /app

# Copy dependency files
COPY package.json package-lock.json ./

# Install dependencies
RUN npm install --omit=dev

# Copy the rest of the application code
COPY . .

# Expose the port on which the application will run
EXPOSE 7003

# Command to run the application
CMD ["node", "server.js"]
