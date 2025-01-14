/**
 * Get a property or a sub property of an Object or an Array
 * Valid property example: 'name'
 * Valid sub-property example: 'person.name', '1.2' (for arrays)
 * @param {Object|Array} subject 
 * @param {string} property_name 
 */
export const getProperty = (subject, property_name) => {
    try {
        const parts = property_name.split('.')
        let property = subject
        for(let part of parts) {
            property = property[part]
        }
        return property
    } catch (error) {
        return null
    }
}
/**
 * sort an array using a list of property names.
 * The property name can be specified also for sub-properties (i.e. 'config.name')
 * TODO: also specify the direction
 * @see https://stackoverflow.com/a/6491621
 * @param {Array} rules List of property names of an Object/array
 * @param {Int} index
 */
export const compareWithRules = (rules, index=0) => (a,b) => {
    let property_name = rules[index]
    let a_value = getProperty(a,property_name)
    let b_value = getProperty(b,property_name)
    if(a_value==b_value) {
        if(index in rules) return compareWithRules(rules, index+1)(a,b)
        return 0
    }
    return a_value<b_value ? -1 : 1
}

export const clone = (data) => {
    return JSON.parse(JSON.stringify(data))
}

export const formatBytes = (bytes, decimals = 2) => {
    if (bytes === 0) return '0 Bytes';

    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

export const setTimeoutAsync = (callback, delay) => {
    let timeout_id
    let promise = new Promise((resolve, reject) => {
        try {
            timeout_id = setTimeout(() => {
                let result = callback()
                resolve(result)
            }, delay)
        } catch (error) {
            reject(error)
        }
    })
    promise.cancel = () => clearTimeout(timeout_id)
    return promise
}