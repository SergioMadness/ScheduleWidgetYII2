function HTMLFilter ($sce) {
    return function (val) {
        return $sce.trustAsHtml(val);
    };
}