var
m,p,a,t,n:byte;
i,x,r,v1,v2,count:longint;
begin
readln(n);
for i:= 1 to n do
 begin
  read (p,a,m,r);
  v2:=p;
  if r < p then count :=0
  else count:=1;
   repeat
    begin
     if v2 > r then
      break
     else
      begin
       v1:=p-a;
       if v1<6 then v1:=6;
       v2:=v2+v1;
       p:=v1;
       count:=count+1;
      end;
    end;
   until v2 > r;
   count:=count-1;
   writeln(count);
 end;
end.
