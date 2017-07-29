# Enterprise_Chat_System
This application is an simple, instant messaging application 
including key features of Facebook, WhatsApp and Skype written in PHP and HTML.

Features:

----------------------
Sign up:
----------------------

1. Creating an account
2. Feedback mail on successful registration
3. Registration failure in signup page due to wrong key
4. Registration failure in signup page due to already existing username
5. Registration failure in signup page due already existing mail id
6. Registration failure in signup page due already existing username and mail id

----------------------
Login:
----------------------

1. Failed authentication due to wrong mail id or password in login page
2. Successful login

----------------------
After Login:
----------------------

1. Enabling User to manage status - Available and Busy
2. Delete account
3. Configure account Case-Password Mismatch (In case the passwords do not match, feedback will be given to the user)
4. Configure account Case: Redirect to login page on successful account configure
5. Dynamic Search friend using this tool
6. Add User as friend
7. Status (If the user logs in to his account his status must be available, he can change status manually to busy, if he is   inactive for certain time then he is idle (in product it is 30seconds) and if he is not logged in he is offline. This information must be updated in database.)

----------------------
Chat:
----------------------
1. Sending messages failed if the person is not in contacts
2. The user will able to send messages to his contacts
3. The user will able to delete his chat with his contact
4. Display of timestamp information with the message
5. Signoff button will be available in the chat page
6. Offline Users should receive a mail regarding message to reduce the delay
7. Text file of upto 4KB (in progress)

----------------------
Contacts:
----------------------
1. Show contact list (phone book)
2. Dynamic status update in phone book
3. Number of unread messages
4. Last seen information
5. Block a contact by a user
6. File upload 
7. Number of files received
8. File download 

----------------------
Admin Page:
----------------------
1. Create Admin account. (Case: successfully created or Case: entered wrong key)
2. Broadcast mail
3. To display chat history
4. To display database records
5. Block/Unblock an user
6. Delete an user
7. To display database statistics –individual statistics
8. To display integrated statistics

----------------------
