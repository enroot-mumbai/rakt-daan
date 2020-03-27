# Raktdaan - https://enroot-mumbai.github.io/rakt-daan/

```bash
The goal of the project is to build a system for mobilizing people to donate blood to their nearest Blood banks
```

# The plan -

Show all blood bank details, give option to search by state, district or Pincode. 

Create a button called as 'Help blood bank', which will open a form for organizers/NGOs. 
The form needs to be discussed more but for now collect - Fullname, number, pincode, address, organization name, KYC, organization proof and selecting a Blood Bank from a List of nearby banks. 

Once this form is filled the admin has to approve it.

These NGOs will receive an e-certificate which allows them to mobilize people from their homes to blood banks. Name of Organizations will be visible besides the Blood Bank they have selected. 

There is another button called 'Donate blood' near the blood bank info which will open a form for donors to donate blood. Collect basic details name, phone number, age, gender, address and date on which they want to donate

Those who register there their data will be visible to the NGO which is registered for the same blood bank. And these donors will also be able to see contact number of the organizer. 

Finally the NGO Organizer has to see all the entries, maybe create a calendar and appoint time slots to all the donors who have registered and coordinate with them to reach blood banks

# Pages - 

## Landing Page - 
1. Explain the problem of shortage of blood
2. Show two buttons - 1. Help Blood Banks & 2. Donate Blood 

![alt text](https://github.com/enroot-mumbai/rakt-daan/blob/develop/landing.png)

## Help Blood banks for Organizations - 
Show the form for Organizers

## Donate Blood for Audience - 
1. Enter Pincode
2. On the basis of Pincode show list of Blood Banks
3. Give option near each blood bank to Donate Blood 
4. Onclick show Donate Blood form

![alt text](https://github.com/enroot-mumbai/rakt-daan/blob/develop/donateblood.png)

# Information Architecture

## Blood Banks Table
Details of the Blood bank
1. Blood Bank Name
2. State
3. District
4. City
5. Address
6. Pincode
7. Contact No
8. Mobile
9. Helpline
10. Fax
11. Email
12. Website
13. Nodal Officer
14. Contact of Nodal Officer
15. Mobile of Nodal Officer
16. Email of Nodal Officer
17. Qualification of Nodal Officer
18. Category
19. Is Blood Component Available?
20. Apheresis
21. Service Time
22. License No
23. Date of License Obtained
24. Date of Renewal
25. Latitude
26. Longitude

## Organizations Table 
Details of the Organizations - Fullname, number, pincode, address, organization name, KYC, organization proof, Blood bank, Approved or Not

## Blood Donor Table 
Name, phone number, age, gender, address, Blood bank and date on which they want to donate, Time (allocated by the Organizer), Donate (true/false)
