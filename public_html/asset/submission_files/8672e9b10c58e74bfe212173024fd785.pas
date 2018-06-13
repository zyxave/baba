var
	t,i,j,temp,n,d,r: longint;
	a,b: array [1..100] of longint;
begin
	readln(t);
	for i := 1 to t do begin
		readln(d, n, r);
		for j := 1 to d do begin
			if (not (j = d)) then
				 read(a[j])
			else readln(a[j]);
		end;
		for j := 1 to d do begin
			if (not (j = d)) then
				 read(b[j])
			else readln(b[j]);
		end;
		temp := 0;
		for j := 1 to d do begin
			if ((a[j] + b[j]) > n) then
				temp := temp + (((a[j] + b[j]) - n)*r)
			else temp := temp + 0;
		end;
		writeln(temp);
	end;
end.