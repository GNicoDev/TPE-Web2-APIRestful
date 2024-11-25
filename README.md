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

| Method | Endpoint | Description | HTTP Response Codes |Example (Postman) |
|--------|-------------------------------|---------------------------------------------|---------------------| ---------|
| GET | /vehicles | Get all vehicles | 200 (OK), 400 (Bad Request), 404 (Not Found) | Set method to GET and URL to `http://localhost/TPE-Web2-APIRestful/vehicles?orderBy=price&orderDir=DESC` |
| GET | /vehicles/:id | Get a vehicle by ID | 200 (OK), 404 (Not Found) | Set method to GET and URL to `http://localhost/TPE-Web2-APIRestful/vehicles/1` |
| POST | /vehicles | Create a new vehicle | 201 (Created), 400 (Bad Request), 500 (Internal Server Error) | Set method to POST, URL to `http://localhost/TPE-Web2-APIRestful/vehicles`, and Body to raw JSON: `{"marca" : "PORSCHE", "modelo" : 2022, "matricula" : "DH692JJ", "precio_dia" : 185, "imagen" : "https://i.pinimg.com/originals/b1/ae/38/b1ae381ff676f908c50bc105d8b18bf3.jpg"}` |
| PUT | /vehicles/:id | Update an existing vehicle | 200 (OK), 400 (Bad Request), 500 (Internal Server Error) | Set method to PUT, URL to `http://localhost/TPE-Web2-APIRestful/vehicles/1`, and Body to raw JSON: `{"modelo" : 2020, "matricula" : "DH692JJ", "precio_dia" : 185, "imagen" : "https://i.pinimg.com/originals/b1/ae/38/b1ae381ff676f908c50bc105d8b18bf3.jpg"}` |
| DELETE | /vehicles/:id | Delete a vehicle | 200 (OK), 404 (Not Found) | Set method to DELETE and URL to `http://localhost/TPE-Web2-APIRestful/vehicles/1` |

&nbsp;&nbsp;
---

## Link de la parte 2 del TPE:  -->  https://github.com/GNicoDev/TPE-Web-2-
