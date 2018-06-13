var i,j,b,m,k,n:longint;
c:string;
a:array[1..5000] of string;
begin
readln(m);
for k:= 1 to m do begin
	readln(n);
		for i:= 1 to n do begin
			readln(a[i]);
		end;
		for i:= 1 to n do begin
			b:=i;
		for j:= i+1 to n do begin
			if (length(a[j])<length(a[b])) then begin
				b:=j;
			end
			else if length(a[j])=length(a[b]) then begin
				if a[j]<a[b] then b:=j;
			end;
		end;
		c:=a[i];
		a[i]:=a[b];
		a[b]:=c;
		end;
		for i:= 1 to n do begin
			writeln(a[i]);
		end;
end;
end.