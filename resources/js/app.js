import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// sidebar
document.getElementById('hamburger-button').addEventListener('click', function() {
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
if (sidebar.classList.contains('-translate-x-full')) {
  sidebar.classList.remove('-translate-x-full');
  sidebar.classList.add('translate-x-0');
  overlay.classList.remove('hidden');
} else {
  sidebar.classList.add('-translate-x-full');
  sidebar.classList.remove('translate-x-0');
  overlay.classList.add('hidden');
}
});

document.getElementById('overlay').addEventListener('click', function() {
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
sidebar.classList.add('-translate-x-full');
sidebar.classList.remove('translate-x-0');
overlay.classList.add('hidden');
});

//header
document.addEventListener('click', function(event) {
const detailsElement = document.querySelector('details');
const summaryElement = document.querySelector('summary');

if (detailsElement.hasAttribute('open') && !detailsElement.contains(event.target)) {
  detailsElement.removeAttribute('open');
}
});

// ToDo
document.addEventListener('DOMContentLoaded', function() {
const maxTodos = 4;
const todoContainer = document.getElementById('todo-container');
const addTodoButton = document.getElementById('add-todo');

addTodoButton.addEventListener('click', function() {
  const todoItems = todoContainer.getElementsByClassName('todo-item');
  if (todoItems.length < maxTodos) {
    const newTodo = todoItems[0].cloneNode(true);
    newTodo.querySelector('input').value = '';
    todoContainer.appendChild(newTodo);
    updateRemoveButtons();
  } else {
    alert('ToDoは最大4つまで追加できます。');
  }
});

function updateRemoveButtons() {
  const removeButtons = todoContainer.getElementsByClassName('remove-todo');
  Array.from(removeButtons).forEach(button => {
    button.addEventListener('click', function() {
      if (todoContainer.getElementsByClassName('todo-item').length > 1) {
        button.parentElement.remove();
      } else {
        // alert('少なくとも1つのToDoを残してください。');
      }
    });
  });
}

updateRemoveButtons();
});

//homework
document.addEventListener('DOMContentLoaded', function() {
  const maxHomeworks = 3;
  const homeworkContainer = document.getElementById('homework-container');
  const addHomeworkButton = document.getElementById('add-homework');

  // 宿題追加処理
  addHomeworkButton.addEventListener('click', function() {
    const homeworkItems = homeworkContainer.getElementsByClassName('homework-item');
    if (homeworkItems.length < maxHomeworks * 2) { // ToDo選択と宿題内容で2つずつ
      // 宿題のToDo選択ブロックと宿題入力ブロックを複製
      const newHomeworkToDo = homeworkItems[0].cloneNode(true);
      const newHomeworkText = homeworkItems[1].cloneNode(true);

      // フォーム内の値を空にする
      newHomeworkToDo.querySelector('select').value = '';
      newHomeworkText.querySelector('textarea').value = '';

      // 新しい削除ボタンにイベントを追加
      newHomeworkText.querySelector('.remove-homework').addEventListener('click', function() {
        removeHomework(newHomeworkToDo, newHomeworkText);
      });

      // 新しいブロックを追加
      homeworkContainer.appendChild(newHomeworkToDo);
      homeworkContainer.appendChild(newHomeworkText);
    } else {
      alert('宿題は最大3つまで追加できます。');
    }
  });

  // 初期削除ボタンにイベントリスナーを追加
  const initialRemoveButtons = document.getElementsByClassName('remove-homework');
  Array.from(initialRemoveButtons).forEach(button => {
    button.addEventListener('click', function() {
      const homeworkItem = button.closest('.homework-item');
      const previousHomeworkItem = homeworkItem.previousElementSibling; // ToDoブロックを取得
      removeHomework(previousHomeworkItem, homeworkItem);
    });
  });

  // 宿題削除処理 (少なくとも1セットは残す)
  function removeHomework(toDoItem, homeworkItem) {
    const homeworkItems = homeworkContainer.getElementsByClassName('homework-item');
    if (homeworkItems.length > 2) { // ToDo選択と宿題内容で最低2つ必要
      toDoItem.remove(); // ToDoブロックを削除
      homeworkItem.remove(); // 宿題ブロックを削除
    } else {
      // alert('少なくとも1つの宿題を残してください。');
    }
  }
});

