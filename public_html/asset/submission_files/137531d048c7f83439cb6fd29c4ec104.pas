uses math;
const
    tfi='';
    tfo='';
    dd:array[1..8] of longint=(-1,-1,0,1,1,1,0,-1);
    cc:array[1..8] of longint=(0,1,1,1,0,-1,-1,-1);
var
    m,n,res,tmp:longint;
    a:array[0..20,0..20] of longint;
    free:array[0..20,0..20] of boolean;
procedure inp;
    var
        i,j:longint;
    begin
        read(m,n);
        for i:= 1 to m do
            for j:= 1 to n do read(a[i,j]);
    end;
procedure dfs(i,j:longint);
    var
        k,ii,jj:longint;
    begin
        inc(tmp);
        free[i,j]:=true;
        for k:= 1 to 8 do
            begin
                ii:=i+dd[k];
                jj:=j+cc[k];
                if (a[ii,jj]=1) and not free[ii,jj] then dfs(ii,jj);
            end;
    end;
procedure process;
    var
        i,j:longint;
    begin
        res:=0;
        for i:= 1 to  m do
            for j:= 1 to n do
                if (a[i,j]=1) and not free[i,j] then
                    begin
                        tmp:=0;
                        dfs(i,j);
                        res:=max(res,tmp);
                    end;
        writeln(res);

    end;
begin
    assign(input,tfi);reset(input);
    assign(output,tfo);rewrite(output);
    inp;
    process;
    close(input);close(output);
end.
