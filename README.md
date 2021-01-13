# A WordPress Backend

## Overview

This is a Headless WordPress backend that has a GraphQL API endpoint. This backend is used to feed data to various apps, devices, and websites. All media is uploaded to an AWS S3 bucket that is configured in the .env file locally to keep secret keys hidden.

## S3 Integration

To keep the server size to a minimum, all media files are uploaded to AWS S3. This is automatically configured with the proper information loaded in to the server in a hidden file. Many of the videos uploaded are several GB and are stored on S3 for cost purposes.

### Local Development

In order to locally develop the AWS user and bucket information must be loaded in to the .env file. An example can be found in the .env.example file. Please reach out to the IT Administrator at Olive Baptist for access to the necessary information.

NEVER UPLOAD THE .ENV FILE TO THE REPOSITORY!!! This is a hidden file to keep others from having access to the S3 bucket.

### S3 Uploads

All media files are automatically added to the S3 bucket under uploads/month/day/year. The URL for the video is then stored in the database and given to the frontend site making an API call.
