var
 n,j,i,t,r:integer;
 d:integer;
 x:array [1..10] of longint;
 x1:longint;
 a,b:array [1..100] of longint;
begin
 readln(t);
 for i:=1 to t do
  begin
   read(n,d,r);
   readln;
   for j:=1 to n do
    read(a[j]);
   readln;
   for j:=1 to n do
    read(b[j]);
   readln;
   for j:=1 to n do
    begin
	 x1:=a[j]+b[j];
	 if (x1>d) then
	  begin
	   x[i]:=x[i]+((x1-d)*r);
	  end;
	end;
  end;
 for i:=1 to t do
  if i=t then write(x[i])
  else writeln(x[i]);
end.
	
	

