#include<bits/stdc++.h>
using namespace std;
int main()
{
    int n;int frek[200]={};
    string s;bool x;int sel,jl[50]={},sell;int t=0;bool y=false;int bil[2];bool z=false;int b,c,mn;
    cin>>n;
    for(int i=0;i<n;i++)
    {
        cin>>s;x=false;sel=0;sell=0;y=false;z=false;t=0;mn=0;
        for(int q=97;q<123;q++)
        {
            frek[q]=0;
        }
        for(int j=0;j<s.size();j++)
        {
            frek[(int)s[j]]++;
            if(s[j]!=s[j+1])
            {
                jl[t]=frek[(int)s[j]];t++;
            }
        }
        sort(jl,jl+t);
        if(jl[0]-jl[t-1]==0){x=true;}
        else if (jl[t-1]-1==jl[t-2]){x=true;}
        else if(jl[0]==1&&jl[1]==jl[t-1]){x=true;}
        if(x==true){cout<<"YES\n";}
        else cout<<"NO\n";
    }

}
