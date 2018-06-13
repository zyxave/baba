#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,i,N,ta,j,bo;
string s[101010];
bool ang(string aa)
{
	ll ii;
	for(ii=0;ii<aa.length();ii++)
	{
		if(!('0'<=aa[ii]&&aa[ii]<='9'))
			return 0;
	}
	return 1;
}
bool valid(string aa)
{
	if(aa.length()<3||aa.length()>20)
		return 0;
	if(ang(aa))
		return 0;
	ll hh=0,ii;
	for(ii=0;ii<aa.length();ii++)
		if(aa[ii]==' '&&aa[ii-1]!=' ')
			hh++;
	if(hh==1||hh==2)
		return 1;
	else
		return 0;
}
string C1(string aa)
{
	string zz;
	ll ii;
	for(ii=0;ii<3;ii++)
		zz+=aa[ii];
	for(ii=0;ii<3;ii++)
		if(zz[ii]>='a')
			zz[ii]-=('a'-'A');
	return zz;
}
string C2(string aa)
{
	string zz;
	ll ii;
	for(ii=0;ii<2;ii++)
		zz+=aa[ii];
	for(ii=0;ii<aa.length();ii++)
	{
		if(aa[ii]==' '&&aa[ii+1]!=' ')
		{
			zz+=aa[ii+1];
			break;
		}
	}
	for(ii=0;ii<3;ii++)
		if(zz[ii]>='a')
			zz[ii]-=('a'-'A');
	return zz;
}
ll tl(string aa)
{
	stringstream ss;
	ll taaa;
	ss<<aa;
	ss>>taaa;
	return taaa;
}
int main()
{
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
//	cin>>t;
	while(getline(cin,s[i])) i++;
	N=i;
	for(i=0;i<N;i++)
	{
		if(ang(s[i]))
		{
			if(i==0)
				continue;
			bo=1;
			//cout<<s[i]<<" "<<i<<"\n";
			ta=tl(s[i]);
			for(j=i+1;j<=i+ta;j++)
				if(!valid(s[j]))
				{
					//cout<<"GAGAL\n";
					bo=0;
					break;
					//continue;
				}
			if(!bo||i+ta+1<N&&!ang(s[i+ta+1]))
			{
				cout<<"GAGAL\n";
				continue;
			}
			map<string,ll> me;
			vector<string> v;
			for(j=i+1;j<=i+ta;j++)
			{
				if(me[C1(s[j])]==0)
				{
					me[C1(s[j])]=1;
					v.pb(C1(s[j]));
				}
				else
				if(me[C2(s[j])]==0)
				{
					me[C2(s[j])]=1;
					v.pb(C2(s[j]));
				}
				else
				{
					bo=0;
				//	cout<<"GAGAL\n";
					break;
				}
			}
			if(bo==0)
			{
				cout<<"GAGAL\n";
				continue;
			}
			for(j=0;j<v.size();j++)
				if(j+1==v.size())
					cout<<v[j]<<"\n";
				else
					cout<<v[j]<<" ";
		}	
	}	
}
