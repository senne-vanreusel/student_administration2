let Student = (function () {

    function hello() {
        console.log('Hello! 🙂');
    }

    return {
        hello: hello    // publicly available as: VinylShop.hello()
    };
})();

export default Student;
