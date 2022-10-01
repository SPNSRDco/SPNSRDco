const hashMyPassword = (password, salt) => {
    //Hash the password with the salt
    let hash = crypto.createHmac('sha512', salt);
    hash.update(password);
    return {
        salt: salt,
        passwordHash: hash.digest('hex')
    }
}