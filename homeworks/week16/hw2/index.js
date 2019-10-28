
function Stack() {
  const arr = [];
  this.push = (pushData) => {
    arr[arr.length] = pushData;
  };
  this.pop = () => {
    const popItem = arr[arr.length - 1];
    arr.splice(arr.length - 1, 1);
    return popItem;
  };
}

function Queue() {
  const arr = [];
  this.push = (pushData) => {
    arr[arr.length] = pushData;
  };
  this.pop = () => arr.shift();
}
const stack = new Stack();
stack.push(10);
stack.push(5);
console.log(stack.pop()); // 5
console.log(stack.pop()); // 10

const queue = new Queue();
queue.push(1);
queue.push(2);
console.log(queue.pop()); // 1
console.log(queue.pop()); // 2
