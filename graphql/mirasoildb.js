import { buildSchema } from "graphql";

export default buildSchema(`
{
    products: [
    	{id: 1,  name: "Ulei esential de lavanda", quantity: 10, price: 30, stock: 100, description: "Descriere ulei", properties: "Proprietati ulei", uses: "Utilizari ulei"},
    	{id: 2,  name: "Hidrolat de lavanda", quantity: 100, price: 16, stock: 50, description: "Descriere hidrolat", properties: "Proprietati hidrolat", uses: "Utilizari hidrolat"},
        {id: 3,  name: "Sapun natural", quantity: 15, price: 5, stock: 20, description: "Descriere sapun", properties: "Proprietati sapun", uses: "Utilizari sapun"},
        {id: 4,  name: "Sirop natural", quantity: 330, price: 25, stock: 32, description: "Descriere sirop", properties: "Proprietati sirop", uses: "Utilizari sirop"},
        {id: 5,  name: "Brichete de foc", quantity: 1, price: 50, stock: 2, description: "Descriere brichete", properties: "Proprietati brichete", uses: "Utilizari brichete"},
        {id: 6,  name: "Buchete florale", quantity: 1, price: 25, stock: 3, description: "Descriere buchete", properties: "Proprietati buchete", uses: "Utilizari buchete"}
    	],
    
    users: [
    	{id: 1,
        	firstname: "Teodora",
        	lastname: "Ispas",
            email: "teo@gmail.com",
            address: "Miraslau",
            phone: "0752345678",
            county: "Alba",
            locality: "Miraslau",
            zipcode: "515470",
        },
    	{id: 2,
        	firstname: "Ion",
        	lastname: "Pop",
            email: "ion@gmail.com",
            address: "Sibiu",
            phone: "0745845879",
            county: "Sibiu",
            locality: "Sibiu",
            zipcode: "645124",
        }
    	],
    
    orders: [
        	{user_id: 1,
                billing_fname: "Teodora",
                billing_lname: "Ispas",
                billing_email: "teo@gmail.com",
                billing_phone: "0752345678",
                billing_address: "Miraslau Str. Principala Nr. 130",
                billing_county: "Alba",
                billing_locality: "Miraslau",
                billing_zipcode: "515470",
                billing_total: "100",
            },
            {user_id: 2,
                billing_fname: "Ion",
                billing_lname: "Pop",
                billing_email: "ion@gmail.com",
                billing_phone: "0745845879",
                billing_address: "Primaverii 23",
                billing_county: "Sibiu",
                billing_locality: "Sibiu",
                billing_zipcode: "645124",
                billing_total: "245",
            }
    ],

    order_product: [
        {
            id: 1,
            order_id: 13,
            product_id: 2,
            quantity: 1
        },
        {
            id: 2,
            order_id: 13,
            product_id: 3,
            quantity: 1
        },
        {
            id: 3,
            order_id: 13,
            product_id: 1,
            quantity: 1
        }
    ],

    admins: [
        {
            id: 1,
            name: "admin",
            email: "admin@gmail.com",
            password: "password"
        }
    ],

    contacts: [
        {
            id: 1,
            name: "Teodora",
            email: "ispas_teodora@yahoo.com",
            phone: "0784578210",
            subject: "Hello",
            message: "Cat costa produsele?"
        }
    ]

}`);
