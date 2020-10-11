// Delete an item if the user selected "Yes"
function deleteItem(id, item) {
    if (confirm('Are you sure about deleting ' + item.toLowerCase() + ' and all related info?')) {
        location.replace('delete' + item + '/' + id);
    } else {
        return false;
    }
}