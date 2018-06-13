                                              var
 t,i,j,k:word;
 x,n:array [1..1000] of longword;
begin
	readln(t);
	for i:=1 to t do
	 begin
	 readln(n[i]);
	 for j:=1 to n[i] do
	  for k:=1 to j do
	   x[i]:=x[i]+1;
          end;
	for i:=1 to t do
	 writeln(x[i]);
end.
