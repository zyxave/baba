#include<bits/stdc++.h>
using namespace std;
int t,i,j,n,x,y,A,B,a,b,res;
char c;
string s;
pair <int,string> S[101];
int main()
{
    cin>>t;
    for(i=1;i<=t;i++)
    {
        cin>>n>>x>>y;
        for(j=0;j<n;j++)
        {
            cin>>s>>c>>a>>b;
            A=x;
            B=y;
            res=0;
            while(A!=B)
            {
                if((A/2)<B)
                {
                    res+=((A-B)*a);
                    A=A-(A-B);
                }
                else if(((A-A/2)*a)<b)
                {
                    res+=((A-A/2)*a);
                    A=A-(A-A/2);
                }
                else
                {
                    res+=b;
                    A/=2;
                }
            }
            S[j]=make_pair(res,s);
        }
        sort(S,S+n);
        for(j=0;j<n;j++) cout<<S[j].second<<" : "<<S[j].first<<endl;
        if(i!=t) cout<<endl;
    }
}
