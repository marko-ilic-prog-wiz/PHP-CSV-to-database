[German Version](README.md)

# The Setup

You need the following tools today.

If you do this test at the office, everything you need to solve your problem is (hopefully) installed on this PC. (If you need more programs, please ask before you install them.)

Otherwise, please make sure that you have the following tools installed:

* [Git](https://git-scm.com/downloads)
* Windows/Mac: [Docker Desktop](https://www.docker.com/products/docker-desktop) (inkl. Docker Compose) oder under Linux: [Docker Engine](https://docs.docker.com/engine/install/) and [Docker Compose](https://docs.docker.com/compose/install/)
* A tool to manage the database (e.g. [DBeaver](https://dbeaver.io/download/))
* an IDE
* a Browser

If Docker/Docker Compose is not available on your PC or laptop, please use a similar setup: MySQL and PHP 7.2 (or higher).

## The Docker Environment

- `docker-compose build` creates the necessary images for the local environment. This step is only necessary initially and after a change to the Dockerfile
- `docker-compose up` starts the local environment.
- `docker-compose down` stops the local environment.
- with `docker-compose exec app bash` you can "log in" to the app container.

The docker environment runs with PHP 7.2 (installed extensions: PDO, mysqli), Apache 2.4 and MySQL 5.6.
If you need additional extensions, you are welcome to install them yourself. 
Just adapt `docker/app/Dockerfile` for this purpose. 

Please put your code in `src/` - the directory is mounted in Docker, so changes in it are 
immediately visible.

MySQL access data for the environment:

PHP:

* hostname: db
* Port: 3306 (default, not required)
* Database: none defined, must still be created
* User: root
* Password: mw-it-test

DBeaver:

* hostname: localhost / 127.0.0.1
* Port: 13306 - use this *only* to connect via DBeaver, *not* in PHP)
* User: root
* Password: mw-it-test

The URL for your browser: `http://localhost:8080/`

## The task

A fictitious customer administration software stores contact data in a MySQL database.
Each contact is given a time stamp when it was entered into the database and when the record was last modified.

The following contact data is also recorded:

* salutation
* first name
* last name
* date of birth 
* country
* email
* phone number
* language

In order to be able to synchronize and expand these contacts with external databases, a web-based tool for import of CSV files should be developed.

The tool should be able to process *arbitrarily structured* CSV files with up to 200,000 records per import.

A distinction must be made between new and existing contacts. While new contacts are merely added to the database, existing contacts are to be imported with the new
data are compared and updated if necessary.

Example data to be imported can be found in the `data` directory. Please have a look at *all* of this files first.

## The implementation

The solution and the scope is entirely up to you. There is no right or wrong. The only condition: We are looking for an object-oriented approach.

If your get-to-know-you day takes place during the week, your mentor is always available to answer your questions or help you with any uncertainties. 
If you decide to solve the task on a weekend, please have a close look at the task and the files in advance,
so that you can clear up any questions or uncertainties with your mentor in advance.

Focus on 3 of the following points (all 4 give an achievement :-)):

* large files can be processed
* Duplicate detection is possible
* different data structures in the files can be processed (see example data)
* Control takes place via a user interface 

To evaluate the database structure a dump of the database in SQL format is to be created and committed.
(can be stored in the folder 'db-data' in the repository)

**Important: commit and push your code! ** Username and password will be sent to you by your 
mentor.

## Feedback

Finally, a small code review will take place, where you will sit down with your mentor and review the day together
and discuss your solution, possible difficulties during implementation and potential improvements.

If your get-to-know-you day takes place during the week, the appointment will take place in the late afternoon.
If you have decided to solve the task on a weekend, the appointment will take place the following week. 
