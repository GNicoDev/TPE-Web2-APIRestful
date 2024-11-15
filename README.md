# TPE Web 2 - APIResTful

This is the REST API version of the TPE-Web-2 project, which is based on an application for renting luxury cars. This API is built with PHP using the MVC architecture and provides endpoints for vehicle management.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Endpoints](#endpoints)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/GNicoDev/TPE-Web2-APIRestful.git    
   ```
2. Navigate to the project directory:
    ```bash
    cd TPE-Web2-APIRestful
    ```
3. Install XAMPP and set up your local server. Ensure Apache and MySQL are running.

4. Move the project directory to the `htdocs` folder of your XAMPP installation. This folder is located in the XAMPP directory (e.g., `C:\xampp\htdocs` on Windows).

5. Import the database schema:
    - Create a database named `alquilerautos`.
    - Import the `database.sql` file located in the `sql` directory of the project.

## Usage

Start your local server and navigate to `http://localhost/TPE-Web2-APIRestful/api` in your browser. You can use tools like Postman to interact with the API endpoints.
## Endpoints

### Vehicles

| Method | Endpoint | Description | HTTP Response Codes | 
|--------|-------------------------------|---------------------------------------------|---------------------| 
| GET | /vehicles | Get all vehicles | 200 (OK) |
| GET | /vehicles/:id | Get a vehicle by ID | 200 (OK), 404 (Not Found) |
| POST | /vehicles | Create a new vehicle | 201 (Created), 400 (Bad Request), 500 (Internal Server Error) | 
| PUT | /vehicles/:id | Update an existing vehicle | 200 (OK), 400 (Bad Request), 404 (Not Found), 500 (Internal Server
| DELETE | /vehicles/:id | Delete a vehicle | 200 (OK), 404 (Not Found) |

