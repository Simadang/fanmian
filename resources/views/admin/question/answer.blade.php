<?php
echo "<table class='mws-table' >";
	echo "<tr>";
		echo "<th>用户iD</th>";
		echo "<th>回复内容</th>";
		echo "<th>时间</th>";
		echo "<th>操作</th>";
	echo "</tr>";
		foreach($data as $k=>$v){
               echo "<tr align='center'>";
                  
                  echo" <td>". $v['uid']." </td>";
                  echo "<td>". $v['content'] ."</td>";
                  echo "<td>".date('Y-m-d H:i:s')."</td>";

                  echo  '<td align="center">';
                   echo "<a href=".url('admin/question/delete/'.$v->id). ">删除</a>　　";
                   echo "<a href=" .url('admin/question/reply/'.$v->qid). ">回复</a>";
                  echo  "</td>";
               echo "</tr>";
             }
echo "</table>";

?>