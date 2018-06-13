// p -a > m

var
t,x,hitung,sisa,i,j,game : integer;
p,a,m,r : array [1..100] of integer;

begin
 readln(t);
 for x:=1 to t do
  begin
   readln(p[x],a[x],m[x],r[x]);
  end;
 for x:=1 to t do
  begin
   sisa:=r[x]-p[x];
   i:=1;
   repeat
    begin
     sisa:=sisa-p[x]+a[x]*i;
     i:= i +1;
    end;
   until p[x]-a[x]*i-m[x]>=0;

  end;
 for x:=1 to t do
  begin
   if sisa>=m[x] then
    begin
     j:=1;
     repeat
      begin
       hitung:=sisa-m[x];
       j:=j+1;
      end;
     until hitung<m[x];
    end;
   end;

 for x:=1 to t do
  begin
   game:=i+j+1;
   writeln(game);
  end;
end.










