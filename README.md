# EVNTO


## Overview
EVNTO is an application designed to enhance event participation and streamline event discovery for students at Mansoura University. 
Initially, the focus was on addressing low student turnout at campus events. However, through extensive research, it became evident that the key issue was not just poor participation but the lack of a centralized and user-friendly platform for discovering and booking events.

## Problem Identification
Our research revealed that students struggled with fragmented information sources, making it difficult to stay informed about upcoming events. 
Traditional promotion methods were ineffective in reaching the student body, and event management was often disorganized. 
This created a gap in communication between event organizers and students, leading to missed opportunities for participation.

## Solution
EVNTO addresses these challenges by providing a unified platform that allows students to easily discover, browse, and register for events in one place.
Whether it's academic workshops, social activities, EVNTO simplifies the process, offering an intuitive and efficient way for students to engage with campus life.

## Features
## 1. User Features

### 1.1 Email and Password Registration

- **Description**:
    -  Allows users to register using their email and password.

### 1.2 Event Listings

- **Description**:
    -   Displays a comprehensive list of upcoming events, sessions, or workshops organized by volunteer teams or mentors.

### 1.3 Event Listings Filtration

- **Description**:
    -  A categorized list of events based on:
       - Free or Paid
       - Upcoming or Past
       - Category

### 1.4 Event Details

- **Description**:
    -  Provides detailed information about each event, including:
        - Description: A brief overview of what the event entails.
        - Goals: A brief overview of what the event goals.
        - Location: Where the event will be held, with possible integration with maps for directions.
        - Date and Time: When the event will take place.
        - Speakers: A brief overview of who is the event speakers.
        - Type: if the event free or paid.

### 1.5 Feedback and Ratings

- **Description**:
    -    Enables attendees to leave feedback and rate events they have attended. This feedback helps event organizers improve future events.

### 1.6 Favorites and Savings

- **Description**:
    -   Allows users to save their favorite teams and receive updates on their latest events.

### 1.7 User Profiles

- **Description**: Users can create and customize their profiles, including:
    - **Interests**: Users can list their interests, which helps the recommendation system provide personalized suggestions.
    - **Skills**: Users can add their skills, relevant to volunteering or participation in events.

## Used Libraries:
- **Web Auth With Breeze**
- **Api Auth With Sanctum**


## ROUTS

| HTTP Method | EndPoint                    | Description                                                    |
|-------------|-----------------------------|----------------------------------------------------------------|
| POST        | api/v1/register             | User Registration                                              |
| POST        | api/v1/login                | User Login                                                     |
| POST        | api/v1/forgot-password      | User Forget Password                                           |
| PUT         | api/v1/profile              | User Update his profile.                                       |
| POST        | api/v1/logout               | User Logout.                                                   |
| GET         | api/v1/events               | Get All Events                                                 |
| GET         | api/v1/events/{id}          | Get Specific Event                                             |
| POST        | api/v1/favorite-events/{id} | Set Favorite Event                                             |
| DELETE      | api/v1/favorite-events/{id} | Delete Favorite Event                                          |
| GET         | api/v1/favorite-events      | Get User Favorite Events                                       |
| GET         | api/v1/search               | Search For an Event                                            |
| GET         | api/v1/filter               | Filter Event based on Category, type and date.                 |
| GET         | api/v1/organizers           | Get All Organizers.                                            |
| POST        | api/v1/comments             | User Set Comment.                                              |
| PUT         | api/v1/comments/{id}        | User Update his Comment.                                       |
| DELETE      | api/v1/comments/{id}        | User Delete his comment.                                       |
| GET         | api/v1/comments/{id}        | GET Event Comments.                                            |
| GET         | api/v1/favorite-events      | Get All favorite-events to enable AI make the Recommendation . |
| GET         | api/v1/users                | Get User's data to enable AI make the Recommendation .         |
| GET         | api/v1/comments             | Get Event Comments to enable AI make the Event Rating .        |


### System Tests
This section outlines how to run system tests for the EVNTO application to ensure all features are working correctly.

### 1. User Registration Test
**Objective**: Test if a user can register using email and password.

**Test Steps**:
1. Navigate to the registration page.
2. Enter valid email and password.
3. Verify that the user can log in after registration.


**Expected Result**: 
1. User can register.
2. User cannot register with existing email.

### 2. User Login Test
**Objective**: Test if a user can log in using email and password.

**Test Steps**:
1. Navigate to the login page.
2. Enter registered email and password.

**PASS**: Tests\Feature\Auth\AuthTest

**Expected Result**:
1. User can login.
2. User cannot login with invalid credentials.

### 3. Logout  Test
**Objective**: Verify that users can log out of the application successfully.

**Test Steps**:
1. Log in as a registered user.
2. Navigate to the user profile.
3. Click on the "Logout" button.

**Expected Result**:
- User can log out.

### 4. Profile Update Test
**Objective**: Verify that users can successfully update their profile information.

**Test Steps**:
1. Log in as a registered user.
2. Navigate to the profile settings or user profile page.
3. Edit one or more fields (e.g., interests, skills, contact information).
4. Click the "Update" button.
5. Verify that the profile information is updated and reflected on the profile page.

**Expected Result**:
- The updated profile information is saved and displayed correctly.

### 9. Retrieve All Users with Profile Skills and Interests Test
**Objective**: Verify that the API correctly retrieves a list of all users along with their profile skills and interests.

**Endpoint**: `GET /api/v1/users`

**Test Steps**:
1. Send a `GET` request to the `/api/v1/users` endpoint.
2. Verify that the response status is `200 OK`.
3. Check the response body to ensure it contains a list of users with their associated skills and interests.
4. Ensure that each user object in the response includes:
    - User ID
    - Collage name
    - Skills (array of skills)
    - Interests (array of interests)

**Expected Result**:
- The API returns a `200 OK` status.
- The response contains a list of users, with each user having their skills and interests included in the data.

**Example Response**:
```json
{
  "users": [
    {
      "id": 1,
      "collage_name": "Science",
      "skills": ["Public Speaking", "Project Management"],
      "interests": ["Workshops", "Bootcamps"]
    },
    {
      "id": 2,
      "name_name": "Computers& Information Science",
      "skills": ["Time Management", "Multitasking"],
      "interests": ["Lectures", "Seminars"]
    }
  ]
}
```
## Installation Instructions

### Prerequisites
Ensure that you have the following installed on your local machine:

- [XAMPP](https://www.apachefriends.org/) (which includes PHP, MySQL, and Apache)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) and npm (for frontend assets)


### Installation Steps

1. Clone the repository from GitHub:

    ```bash
    git clone https://github.com/swarmsTeam/swarms-backend.git
    ```

2. Install the PHP dependencies using Composer:

    ```bash
    composer install
    ```

3. Copy the `.env.example` file to create your environment configuration:

    ```bash
    cp .env.example .env
    ```

4. Generate an application key:

    ```bash
    php artisan key:generate
    ```

5. Install Laravel Breeze:

    ```bash
    composer require laravel/breeze --dev
    ```

6. Install Breeze and run the scaffolding (depending on whether you are using Blade or Inertia):

    For Blade:

    ```bash
    php artisan breeze:install
    ```


7. Create a database and configure your `.env` file:

    - Create a new database in your XAMPP (or other MySQL setup).
    - Open the `.env` file and update the following lines with your database details:

    ```env
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

    Once the `.env` file is updated with the correct database information, run the database migrations:

    ```bash
    php artisan migrate
    ```

8. Install Node.js dependencies and build the frontend assets:

    ```bash
    npm install
    npm run dev
    ```

### Running the Application

1. Start the local development server:

    ```bash
    php artisan serve
    ```

2. Open your browser and navigate to:

    ```
    http://localhost:8000
    ```





