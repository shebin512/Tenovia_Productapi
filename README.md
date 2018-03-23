# README

## Tenovia Productapi

### Requirement : 

**Exercise :**  Magento attribute data updation through API

**Objective :** is to update attribute data for an sku using POSTMAN

**Task Description :** Create a Magento API to update values for the below product attribute

Attributes required to be created
a) Batch code - text box
b) Expiry date
c) Price 
d) Qty

---
## Installation : 

Download the package and extact it to {document_root}/app/code

Enable the module by running ` php bin/magento module:enable Tenovia_Productapi `

Run setup upgrade ` php bin/magento setup:upgrade `

Clear di and generations ` rm -rf var/di/* var/generation/* `

Clear cache ` php bin/magento cache:clear `

---

## API URLS and Data format:

#### 1. Price Upadte
{base_url}/rest/V1/tenovia-productapi/updateprice

type: POST
Data: 
```json
{
"id":"1", ==> string SKU of product
"value":11.00 ==> should be float
}
```

#### 2. Qty Update
{base_url}/rest/V1/tenovia-productapi/update-qty

type: POST
Data: 
```json
{
"id":"1", ==> string SKU of product
"value": 80.00 ==> should be float
}
```
#### 3. Batch Code Update
{base_url}/rest/V1/tenovia-productapi/update-batch-code

type: POST
Data: 
```json
{
"id":"1", ==> string SKU of product
"value":"ABCASSS" ==> string
}
```

#### 4. Expiry Date Update
{base_url}/rest/V1/tenovia-productapi/update-expiry-date

type: POST
Data: 
```json
{
"id":"4", ==> string SKU of product
"value":"2018-03-20" ==> string
}
```
---
### TODOs
* Implement ACL.
* Single api call to update all the product attribute
