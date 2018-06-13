var
 i:word;
 n,j,k,m:longword;
 x:array [1..1000000] of char;
 l:array [1..1000] of longword;
begin
 readln(i);
 for i:=1 to i do
  begin
   readln(n);
   for j:=1 to n do
    x[j]:='p';
   for j:=1 to n do
   begin
    m:=0;
    for k:=1 to n do
     begin
	 if (k mod j=0) then
	  if (x[k]='p') then x[k]:='m'
          else x[k]:='p';
         if x[k]='m' then m:=m+1;
     end;
   end;
   l[i]:=m;
  end;
 for i:=1 to i do
  writeln(l[i]);
end.
