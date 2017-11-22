<table cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th scope="col">id</th>
    <th scope="col">내용</th>
    <th scope="col">생성일</th>
    <th scope="col">변경일</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td><?= h($memo['id']) ?></td>
    <td><?= h($memo['content']) ?></td>
    <td><?= h($memo['created']) ?></td>
    <td><?= h($memo['updated']) ?></td>
  </tr>
</table>
