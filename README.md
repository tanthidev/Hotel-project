Hotel Booking System

A web-based hotel booking system designed using HTML, CSS, JavaScript for the front-end and PHP for the back-end. The system follows the MVC (Model-View-Controller) design pattern and uses a MySQL database.
Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.
Prerequisites

    Docker

Installing Docker

Here is a guide to install Docker on your local machine:

    Download and install Docker Desktop from the official website: https://www.docker.com/products/docker-desktop
    Launch Docker Desktop and log in to your Docker ID
    Open a terminal window and run the following command to verify that Docker is installed correctly:

docker run hello-world

Running the Project

    Clone the repository to your local machine using the following command:

bash

git clone https://github.com/tanthidev/Hotel-project.git

    Change into the project directory using the following command:

bash

cd Hotel-project

    Run the following command to start the project:

docker-compose up

    Access the project in your browser at http://localhost:8080

Features

    User authentication (login, register, reset password using email OTP)
    Ability to change user information
    Check booking history
    Search, filter, and book rooms
    Admin CRUD (Create, Read, Update, Delete) for users, rooms, and booking lists
    Default admin account: username: admin, password: 123456

Built With

    HTML
    CSS
    JavaScript
    PHP
    MySQL
    Docker

Author

TanthiDev
