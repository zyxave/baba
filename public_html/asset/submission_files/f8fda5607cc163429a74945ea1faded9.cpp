#include<bits/stdc++.h>
using namespace std;
int main()
{
    int t,n;string s[1005];string mx;int mxx;
    cin>>t;
    for(int i=0;i<t;i++)
    {
        cin>>n;
        for(int j=0;j<n;j++)
        {
            cin>>s[j];
        }

        for(int k=0;k<n;k++)
        {
            for(int l=k+1;l<n;l++)
            {
                if(s[k].size()>s[l].size())
                {
                    swap(s[k],s[l]);
                }
                else if(s[k].size()==s[l].size()&&s[k]>s[l])
                {
                    swap(s[k],s[l]);
                }
            }
        }
    }
     for(int m=0;m<n;m++)
        {
            cout<<s[m]<<endl;
        }
}
