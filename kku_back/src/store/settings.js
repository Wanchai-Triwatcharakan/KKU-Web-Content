const appConfigDEV = {
    isDevMode: true,
    language: "th",
    timeZone: "Asia/Bangkok",
    languageAvailable: ["th"],  
    apiPath:"http://localhost:8000/api/backoffice/v1/",
    uploadPath:"http://localhost:8000/",
    webPath:"http://localhost:5173/",
    pages: {
        categories: true,
        subcategories: true,
        products: false,
        services: false,
        portfolios: true,
        designs: true,
        posts: true,
        postscontent: true,
        lecturers: true,
        seminarSchedule: true,
        roomSeminar: true,
        activityphoto: true,
        messages: true,
        webinfo: true,
        languages: false,
        admins: true,
        configs: true,
        slides: true,
        groups: {
            category: true,
            product: true,
            article: true,
            system: true,
            mail: true,
        }
    },
    features: {
        multilingual: true,
        flexibleCategory: true,
        multipleImage: true,
        seo: true,
        price: false,
        tag: true,
        iframe: true,
        redirect: true,
        social: false,
        notify: false,
    }
}
const appConfigPROD = {
    isDevMode: false,
    language: "th",
    timeZone: "Asia/Bangkok",
    languageAvailable: ["th"],  
    apiPath:"https://api.chaum2021.com/api/backoffice/v1/",
    uploadPath:"https://api.chaum2021.com/",
    webPath:"https://chaum2021.com/",
    pages: {
        categories: true,
        subcategories: true,
        products: true,
        services: true,
        portfolios: true,
        designs: true,
        posts: true,
        postscontent: true,
        lecturers: true,
        seminarSchedule: true,
        roomSeminar: true,
        activityphoto: true,
        messages: true,
        webinfo: true,
        languages: false,
        admins: true,
        configs: true,
        groups: {
            category: true,
            product: true,
            article: true,
            system: true,
        }
    },
    features: {
        multilingual: true,
        flexibleCategory: true,
        multipleImage: true,
        seo: true,
        price: false,
        tag: true,
        iframe: true,
        redirect: true,
        social: false,
        notify: false,
    }
}

export default appConfigDEV;
// export default appConfigPROD;



