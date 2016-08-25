
var WrapperView = Tailor.Views.Wrapper,
    CustomWrapper;

CustomWrapper = WrapperView.extend( {
    
    // The child view container is where the children elements go
    childViewContainer : '.tailor-custom-wrapper__content'
} );

module.exports = CustomWrapper;