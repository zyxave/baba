var
t,dum,x,y,z,a,b,l:longint;
c:array[1..26] of longint;
nao:char;
s:string;
test,ans,check:boolean;
begin
readln(t);
for z:=1 to t do
begin
a:=1;
b:=1;
readln(s);
l:=length(s);
for y:=1 to l do
	begin
	if s[y]=s[y+1] then inc(a) else begin c[b]:=a; a:=1; inc(b); end;
	end;
test:=false;
check:=false;
ans:=true;
for y:=1 to b-1 do
	begin
	if (c[y]<>c[y+1]) and (y<(b-1)) then
		if check=true then
		ans:=false
		else
		begin
		check:=true;
		if test=true then 
			if c[y+1]<c[y] then ans:=false;
		if test=false then
			begin
			if c[y+1]<c[y] then if (c[y+2]<>c[y+1]) and (c[y+1]<>1) then ans:=false;
			if c[y+1]>c[y] then if (c[y+2]<>c[y]) and (c[y]<>1) then ans:=false;
			end;
		end
	else test:=true;
	end;
if(ans)then writeln('YES') else writeln('NO');
end;
end.