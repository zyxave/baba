#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll t,i;
string s;
int main()
{
	cin>>t;
	cin.ignore();
	while(t--)
	{
		string z;
		getline(cin,s);
		for(i=0;i<s.length();i++)
		{
			if(s[i]=='-')
				continue;
			if(s[i]==' '||s[i]=='_')
			{
				z=z+'-';
			}
			else
			if('A'<=s[i]&&s[i]<='Z')
			{
				//s[i]=s[i]-('A'-'a');
				if(i!=0&&z[z.length()-1]!='-')
					z+='-';
				z+=s[i]-('A'-'a');
				//	z.insert(z.length(),"_");
			//	z+=s[i];
			}
			else
				z+=s[i];
			//cout<<z<<"\n";
		}
		cout<<z<<"\n";
	}
}
