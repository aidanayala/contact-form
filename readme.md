# Contact Form

This application is intended to demonstrate an implementation of a user friendly & secure contact form.

The initial commit on this repository is just the laravel framework & npm dependencies. Everything after is code I've written.

## Usage

The application has been deployed [here](https://contact.aidanayala.party/) (https://contact.aidanayala.party/)

And database submissions can be viewed [here](https://contact.aidanayala.party/enquiries) (https://contact.aidanayala.party/enquiries)

## Tech Stack

### Backend (Laravel)

My choice of Laravel (apart from loving the framework) was more to emulate the ability to build out functionality under the scaffolding of an existing framework. Making use of boilerplate functionality alongside extending it with any additional feature I required.

### Frontend (VueJS - Served by Laravel)

I've used VueJS as I've always found it to be a brilliant frontend framework for creating user friendly interfaces on an ad-hoc component basis. So while a websites frontend may not exclusively run on Vue, we can add in components as an when required. Additionally it was noted that BluBolt use VueJS.

### CSS/SASS

I've used TailWindCSS to help scaffold the frontend. The intention of this is to demonstrate the ability to use such pre-built boilerplate components (and custom extended components). It's also a brilliant & fun framework for building out light weight UIs.

### Server

The applications running on a DigitalOcean droplet using the Ubuntu distribution. PHP 7.2, Nginx & MySQL.

## Implementation

### Usability

This simple form provides an clean UI & interface to submit an enquiry. Upon a successful submission the user is shown their enquiry and sent an enquiry confirmation email.

An improvement which could be made here is to apply a fallback form should the connected browser have JavaScript disabled.

An additional improvement would be to queue the emails being sent on a job dispatcher. This will speed up the user experience.

### Validation

All validation is carried out server side. This not only allows for translated responses but also allows scope for more complex spam protection.

Once a user submits a request it is validated against a set of rules. If all rules are passed then the enquiry is submitted. 

### Security

The form is served over HTTPS to protect sensitive information. All data is stored in a MySQL database using PHPs PDO library to avoid SQL Injections.

### Abuse Prevention

A few abuse prevention methods have been implemented here.

1. **CSFR:** All POST requests made to the "/contact" route (which validates and processes an enquiry) must contain a valid CSFR token otherwise they will error. Preventing abuse from bots or even humans spamming this route with the required data.
2. **Honey Trap:** A simple honey trap has been added to help stop bots from spamming. If a hidden field in the form is filled then the request will false it's success and log the request for further investigation.
3. **Request Throttling:** The POST route has been throttled to block any users making more than 10 requests per minute.

Prevention could be increased by:

1. Validating the e-mail address against a 3rd party service
2. Using machine learning to examine the contents of the request, to detect spam.
3. HTML Field Obfuscation
4. Using a non-intrusive Cpatcha
